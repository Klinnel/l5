<?php

namespace App\Http\Controllers;

use App\Cg7;
use App\Http\Controllers\Auth\RegisterController;

class PagesController extends Controller {

  public function Contact() {

    Cg7::UsageValidator();

    return view('pages.contact');
  }

  public function About() {

    $me        = new \stdClass();
    $me->first = 'Lionel';
    $me->last  = 'COTE';

    $friends = [
      'Pierre',
      'Paul',
      'Jacques'
    ];
    //    $friends =null;
    
    return view('pages.about', compact('me', 'friends'));
  }
}
