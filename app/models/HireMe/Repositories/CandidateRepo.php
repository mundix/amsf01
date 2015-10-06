<?php

namespace HireMe\Repositories;

use Commons\Repositories\BaseRepo;
use HireMe\Entities\Candidate;
use HireMe\Entities\Category;
use HireMe\Entities\User;
use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;
use Illuminate\Support\Facades\Mail;
//use Resources\Entities\PasswordReminder;

class CandidateRepo extends BaseRepo
{
    /**
     *
     * Este metodo debe estar definido en todos los repos que lo utilizen
     *
     */
    public function getModel()
    {
        return new Candidate;
    }

    public function findLastest($take = 10)
    {
        return Category::with([
            'candidates' => function($q) use ($take){
                $q->take($take); //Creano Variable
                $q->orderBy('created_at','DESC');
            },
            'candidates.user'])->get();
    }

    /**
     * Function para devolder un nuevo Candidato.
    */
    public function newCandidate()
    {
        $user = new User();
        $user->type = 'employee';
        return $user;
    }

    public function findUser($id)
    {
        return User::find($id);
    }

    public function resetPassword(User $user)
    {
        $generator = new ComputerPasswordGenerator();
        $generator
            ->setOptionValue(ComputerPasswordGenerator::OPTION_UPPER_CASE, true)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_LOWER_CASE, true)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_NUMBERS, true)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_SYMBOLS, false);

        $password = $generator->generatePassword();
//        $user->password = \Hash::make($password);
        $user->password = ($password); //No necesita el Hash por que ya en el usaurio el campo tiene autohash
        if(!$user->save())
            return FALSE;

        Mail::send('themes.melon.emails.users.reset_password',compact('user','password'),function($message) use ($user)
        {
            $message->to($user->email,$user->full_name)->subject('Restaurar Contrase&ntilde;a Sistema de Inventario');
        });

        if(count(Mail::failures()) > 0){
            return FALSE;
        }
        return TRUE;
    }

    public function findUserByEmail($email = null)
    {
        if($user = User::where('email',$email)->first())
            return $user;
        return 0;
    }

    public function save(User $user,$params = [])
    {
        $candidate = $this->getModel();
        $candidate->id = $user->id;
        $candidate->phone = isset($params['phone'])?$params['phone']:"";
        $candidate->gender = isset($params['gender'])?$params['gender']:"male";
        $candidate->category_id = 1;
        $candidate->available = 1;
        $candidate->save();
        $password = $this->generatePassword();
        $candidate->user->password = $password;
        if($candidate->user->save())
        {
            if(!$user->save())
                return FALSE;

            Mail::send('themes.melon.emails.users.registered',compact('candidate','password'),function($message) use ($candidate)
            {
                $message->to($candidate->user->email,$candidate->user->full_name)->subject('Restaurar Contraseña Sistema de Inventario y Facturación');
            });

            if(count(Mail::failures()) > 0){
                return FALSE;
            }
            return TRUE;
        }
    }

    public function getUserByToken($token)
    {
//        echo "<pre>";
//        $passReminder = PasswordReminder::where('token',$token)->get();
//        $obj = json_decode($passReminder);
//        return $this->findUserByEmail($obj[0]->email);
    }

    public function generatePassword()
    {
        $generator = new ComputerPasswordGenerator();
        $generator
            ->setOptionValue(ComputerPasswordGenerator::OPTION_UPPER_CASE, true)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_LOWER_CASE, true)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_NUMBERS, true)
            ->setOptionValue(ComputerPasswordGenerator::OPTION_SYMBOLS, false);

        return  $generator->generatePassword();

    }
}

