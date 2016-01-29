<?php

namespace App\Helpers;

    class myFunctions {
        public function is_ok() {
            return 'myFunction is OK';
        }
        
        public function unauthorized($pstatus)
    {
//            if ( $pstatus ){
//            return redirect()->route('home');
//            }
    return redirect('errors/unauthorized')->with('status', 'nt authorized!');
    //return redirect(action('BlogController@unauthorized'))->with('status', 'nt authorizeeed!');
            
    }
//    if( $city->hasBigPark() )
//{
//    return Redirect::to('confirm');
//}

    }

?>
