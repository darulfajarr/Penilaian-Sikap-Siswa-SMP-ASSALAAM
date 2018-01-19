<?php

namespace App;

use App\Book;
use App\BorrowLog;
use App\Exceptions\BookException;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $cast =[
        'is_verified'=>'boolean',
    ];
    public function borrow(Book $book)
    {
        //cek apakah masih ada stock buku
        if($book->stock < 1){
            throw new BookException("Produk $book->title Sedang Tidak Tersedia.");            
        }
        //cek apakah buku ini sedang dipinjam oleh user
        if($this->borrowLogs()->where('book_id',$book->id)->where('is_returned',0)->count() > 0 ){
            throw new BookException("Produk $book->title Sedang Anda Pesan.");
            
        }

        $borrowLog = BorrowLog::create(['user_id'=>$this->id,'book_id'=>$book->id]);
        return $borrowLog;
    }
    public function BorrowLogs()
    {
        return $this->hasMany('App\BorrowLog');
    }

    public function generateVerificationToken()
    {
        $token = $this->verification_token;
        if (!$token) {
            $token = str_random(40);
            $this->verification_token = $token;
            $this->save();
        }
        return $token;
    }
    
    public function sendVerification()
    {
        $token = $this->generateVerificationToken();
        $user = $this;

        Mail::send('auth.emails.verification', compact('user', 'token'), function ($m) use ($user) {
            $m->to($user->email, $user->name)->subject('Verifikasi Akun Larapus');
        });
    }
    public function verify()
    {
        $this->is_verified = 1;
        $this->verification_token = null;
        $this->save();
    }

}
