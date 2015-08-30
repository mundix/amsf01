package encriptacion;

import java.io.IOException;
import java.io.UnsupportedEncodingException;
import java.security.InvalidAlgorithmParameterException;
import java.security.InvalidKeyException;
import java.security.NoSuchAlgorithmException;
import java.security.spec.AlgorithmParameterSpec;
import java.security.spec.InvalidKeySpecException;
import java.security.spec.KeySpec;
import javax.crypto.BadPaddingException;

import javax.crypto.Cipher;
import javax.crypto.IllegalBlockSizeException;
import javax.crypto.NoSuchPaddingException;
import javax.crypto.SecretKey;
import javax.crypto.SecretKeyFactory;
import javax.crypto.spec.PBEKeySpec;
import javax.crypto.spec.PBEParameterSpec;

/**
 *
 * @author ISMENDY RAFAEL SANDOVAL RODRIGUEZ
 * ismendy@msn.com
 * 809-865-0391
 * Licencia GPL
 */

public class Encriptacion {

    private final String CLAVE="RECTOR";
    
    private byte[] SALT_BYTES = { (byte) 0xA9, (byte) 0x9B, (byte) 0xC8, (byte) 0x32, (byte) 0x56, (byte) 0x35, (byte) 0xE3, (byte) 0x03 };

    private int ITERATION_COUNT = 19;

    private String encriptar(String passPhrase, String str) {
        Cipher ecipher = null;
        Cipher dcipher = null;
        try {
            // Crear la key
            KeySpec keySpec = new PBEKeySpec(passPhrase.toCharArray(), SALT_BYTES, ITERATION_COUNT);
            SecretKey key = SecretKeyFactory.getInstance("PBEWithMD5AndDES").generateSecret(keySpec);
            ecipher = Cipher.getInstance(key.getAlgorithm());
            dcipher = Cipher.getInstance(key.getAlgorithm());

            // Preparar los parametros para los ciphers
            AlgorithmParameterSpec paramSpec = new PBEParameterSpec(SALT_BYTES, ITERATION_COUNT);

            // Crear los ciphers
            ecipher.init(Cipher.ENCRYPT_MODE, key, paramSpec);
            dcipher.init(Cipher.DECRYPT_MODE, key, paramSpec);

            // Encodear la cadena a bytes usando utf-8
            byte[] utf8 = str.getBytes("UTF8");

            // Encriptar
            byte[] enc = ecipher.doFinal(utf8);

            // Encodear bytes a base64 para obtener cadena
            return new Enc64().encode(enc);

        } catch (NoSuchAlgorithmException | InvalidKeySpecException | NoSuchPaddingException | InvalidKeyException | InvalidAlgorithmParameterException | UnsupportedEncodingException | IllegalBlockSizeException | BadPaddingException e) {
            return null;
        }
    }

    private String desencriptar(String passPhrase, String str) {
        Cipher ecipher = null;
        Cipher dcipher = null;

        try {
            // Crear la key
            KeySpec keySpec = new PBEKeySpec(passPhrase.toCharArray(), SALT_BYTES, ITERATION_COUNT);
            SecretKey key = SecretKeyFactory.getInstance("PBEWithMD5AndDES").generateSecret(keySpec);
            ecipher = Cipher.getInstance(key.getAlgorithm());
            dcipher = Cipher.getInstance(key.getAlgorithm());

            // Preparar los parametros para los ciphers
            AlgorithmParameterSpec paramSpec = new PBEParameterSpec(SALT_BYTES, ITERATION_COUNT);

            // Crear los ciphers
            ecipher.init(Cipher.ENCRYPT_MODE, key, paramSpec);
            dcipher.init(Cipher.DECRYPT_MODE, key, paramSpec);

            // Decodear base64 y obtener bytes
            byte[] dec = new Dec64().decodeBuffer(str);

            // Desencriptar
            byte[] utf8 = dcipher.doFinal(dec);

            // Decodear usando utf-8
            return new String(utf8, "UTF8");

        } catch (NoSuchAlgorithmException | InvalidKeySpecException | NoSuchPaddingException | InvalidKeyException | InvalidAlgorithmParameterException | IOException | IllegalBlockSizeException | BadPaddingException e) {
            return null;
        }
    }

    public String codificar(String texto){
        return encriptar(CLAVE, texto);
    }

    /**
     * Decodifica un texto
     * @param texto
     * @return
     */
    public String decodificar(String texto){
        return desencriptar(CLAVE, texto);
    }
    
}