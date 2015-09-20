<?php

namespace HireMe\Repositories;

use Commons\Repositories\BaseRepo;
use HireMe\Entities\Candidate;
use HireMe\Entities\Category;
use HireMe\Entities\User;
use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;

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
        $user->type = 'candidate';
        return $user;
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
        $user->password = \Hash::make($password);
        $user->save();
//        $data = ['password'=>$password,'user'=>$user];
        \Mail::send('themes.melon.emails.users.reset_password',compact('user','password'),function($message) use ($user)
        {
            $message->to($user->email)->from('admin@mysite.do', 'Administrator')->subject('Reset Password');
        });
        if(count(\Mail::failures()) > 0){
            print_r(\Mail::failures());
//           return $errors = 'Failed to send password reset email, please try again.';
        }
    }

    public function findUserByEmail($email = null)
    {
        if($user = User::where('email',$email)->first())
            return $user;
        return 0;
    }
}