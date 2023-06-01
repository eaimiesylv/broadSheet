@extends('auth.header')

@section('content')
<style>
#wrapper{
    background:white;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    padding:1em;
    
    
}
   form span{
    display:block;
    padding-bottom:3px
   }
   #login{
            padding:2em;
            
        }
   @media (max-width:900px)  {
        
        #login{
            padding:3em;
        }
    }
</style>
<div class="container">
    <div  class="row justify-content-center">
        <div id="wrapper" class="col-md-8">
        
        
  

            <p>This Session Has Expired</p>
                   
                
            
        </div>
    </div>
</div>
@endsection
