<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as BasicAuthenticatable;
class Utilisateur extends Model implements Authenticatable {
    use BasicAuthenticatable; // cree les 6 methodes pour Ulitsateur pour le bug
    protected $fillable= ['email','mot_de_passe'];// pour faire marcher massassignment
    
    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }
    
}