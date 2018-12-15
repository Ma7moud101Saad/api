<?php
namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait traitExeption{
    public function apiExeption($request,$e)
        {

               if($this->modelExcption($e))
            {
                 return $this->responceModel();
            }
            
                if($this->httpException($e) )
            {
                    return $this->responceHttp();
            }
        }
        
        public function modelExcption($e) {
           return $e instanceof ModelNotFoundException;
            
        }
        
        public function httpException($e) {
            return $e instanceof NotFoundHttpException ;
            
        }
        
        public function responceModel() {
            return response()->json([
                    
                    'errors'=>'product model not found'
                    
                    ],Response::HTTP_NOT_FOUND);
            
        }
        
        public function responceHttp() {
             return response()->json([
                    
                    'errors'=>'incorrect route'
                    
                    ],Response::HTTP_NOT_FOUND);
            
        }
}
 
?>
