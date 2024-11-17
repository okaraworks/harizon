<?php

use ChurchCRM\Base\Event;

include 'classes/engine.php';

    $router=new AltoRouter();

    $router ->setBasePath('/kibet');

    //Routes
    $router->map('GET','/',function(){
        include 'views/main.php';
    });

    $router->map('GET|POST','/dashboard',function(){
        include 'views/dashboard.php';
    });

    $router->map('GET|POST','/login',function(){
        include 'views/login.php';
    });

    $router->map('GET|POST','/123',function(){
        include 'views/123.php';
    });


    //create account
    $router->map('GET|POST','/create-account',function(){
        include 'views/signup.php';
    });

    $router->map('GET','/logout',function(){
        Session::logOut();
    });

    $router->map('GET|POST','/add-users',function(){
        include 'views/addusers.php';
    });

    $router->map('GET','/users',function(){
        include 'views/registered_users.php';
    });

    $router->map('GET|POST','/edit_user',function(){
        include 'views/edituser.php';
    });

    $router->map('GET|POST','/view-details',function(){
        include 'views/mydetails.php';
    });

    $router->map('GET','/users-logged',function(){
        include 'views/loggedin.php';
    });

    $router->map('GET|POST','/edit-users',function(){
        echo Users::userEdit();
    });

    $router->map('GET|POST','/change-pass',function(){
        echo Users::passwordRest();
    });

    $router->map('GET|POST','/reset_password',function(){
        include 'views/password.php';
    });

    $router->map('GET|POST','/delete_user',function(){
        echo Users::delUser();
    });

    $router->map('POST','/auth/login',function(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        echo Users::checkUser($username,$password);
    });

    //change pass
    $router->map('GET|POST','/changepass',function(){
        include 'views/changepass.php';
     });

    //  registered~persons
     $router->map('GET|POST','/registered~persons',function(){
        include 'views/registeredpersons.php';
     });

     //deletemember
     $router->map('GET|POST','/deletemember',function(){
        echo Persons::delMember();
     });

     //addPerson
     $router->map('GET|POST','/addPerson',function(){
        include 'views/addmember.php';
     });

    //add-member-children
    $router->map('GET|POST','/add-member-children',function(){
        include 'views/addchildren.php';
     });

     //children
      $router->map('GET|POST','/member-children',function(){
        include 'views/children.php';
     });

    //  delete-child
     $router->map('GET|POST','/delete-child',function(){
        echo Persons::delChild();
     });

     //editmember
     $router->map('GET|POST','/editmember',function(){
        include 'views/editmember.php';
     });

     //member-info.htm
     $router->map('GET|POST','/member-info.htm',function(){
        include 'views/member-info.php';
     });

     //gallery-pics
     $router->map('GET|POST','/gallery-pics',function(){
        include 'views/gallery-pics.php';
     });

    //  delete_image
    $router->map('GET|POST','/delete_image',function(){
        echo Website::deleteImage();
     });

     //member-edit-info
     $router->map('GET|POST','/member-edit-info',function(){
        include 'views/member-edit-info.php';
     });

     //member-add-personalinfo
     $router->map('GET|POST','/member-add-personalinfo',function(){
        include 'views/member-add-personalinfo.php';
     });

     //member-add-children
     $router->map('GET|POST','/member-add-children',function(){
        include 'views/member-add-children.php';
     });

     //member-add-parentinfo
     $router->map('GET|POST','/member-add-parentinfo',function(){
        include 'views/member-add-parentinfo.php';
     });

     //myparents
     $router->map('GET|POST','/myparents',function(){
        include 'views/myparents.php';
     });

     //members-parents
     $router->map('GET|POST','/members-parents',function(){
        include 'views/members-parents.php';
     });

    //members-parents-view
    $router->map('GET|POST','/members-parents-view',function(){
        include 'views/members-parents-view.php';
     });

     //deleteparent
     $router->map('GET|POST','/deleteparent',function(){
        echo Parents::delParent();
     });

     //addParent
     $router->map('GET|POST','/addParent',function(){
        include 'views/addParent.php';
     });

      //Event
     $router->map('GET|POST','/events.html',function(){
        include 'views/events.php';
     });

     //addevent.html
     $router->map('GET|POST','/addevent.html',function(){
        include 'views/addevents.php';
     });

    //  editevent
    $router->map('GET|POST','/editevent',function(){
        include 'views/editevent.php';
     });

     //delevent
      $router->map('GET|POST','/delevent',function(){
        echo Events::deleteEvent();
     });

     //addmychildren
     $router->map('GET|POST','/addmychildren',function(){
        include 'views/addmychildren.php';
     });

     //mychildren
     $router->map('GET|POST','/mychildren',function(){
        include 'views/mychildren.php';
     });

     //deletemychildren
     $router->map('GET|POST','/deletemychildren',function(){
        echo Children::delMyChild();
     });

     //editmychild
     $router->map('GET|POST','/editmychild',function(){
        include 'views/editmychild.php';
     });

     //edit-child
     $router->map('GET|POST','/edit-child',function(){
        include 'views/edit-child.php';
     });

     //member-children-add
     $router->map('GET|POST','/member-children-add',function(){
        include 'views/member-children-add.php';
     });

     //register-children
     $router->map('GET|POST','/register-children',function(){
        include 'views/register-children.php';
     });

     //editparents
      $router->map('GET|POST','/editparents',function(){
        include 'views/editparents.php';
     });

     //member-edit-parents
     $router->map('GET|POST','/member-edit-parents',function(){
        include 'views/member-edit-parents.php';
     });

     //addnextofkin
     $router->map('GET|POST','/addnextofkin',function(){
        include 'views/addnextofkin.php';
     });

     //adding-nextofkin
     $router->map('GET|POST','/adding-nextofkin',function(){
        include 'views/addingnext.php';
     });

     //nextofkin.html
     $router->map('GET|POST','/nextofkin.html',function(){
      include 'views/nextofkin.php';
      });

    //deletenext
    $router->map('GET|POST','/deletenext',function(){
      echo NextofKin::delNext();
    });

   //editnextofkin
   $router->map('GET|POST','/editnextofkin',function(){
      include 'views/editnextofkin.php';
   });

   //viewmy nextofkin
   $router->map('GET|POST','/viewmynextofkin',function(){
      include 'views/mynextofkin.php';
   });

   //deletemynext
   $router->map('GET|POST','/deletemynext',function(){
      echo NextofKin::delMyNext();
    });

   //  addmynextofkin
    $router->map('GET|POST','/addmynextofkin',function(){
      include 'views/addmynextofkin.php';
   });

   //add-spouse-details
   $router->map('GET|POST','/add-spouse-details',function(){
      include 'views/add-spouse-details.php';
   });

   //member-make-contribution
   $router->map('GET|POST','/member-make-contribution',function(){
      include 'views/member-make-contribution.php';
   });

   //my-contributions
   $router->map('GET|POST','/my-contributions',function(){
      include 'views/mycontributions.php';
   });

   //monthlycontributions-pending
   $router->map('GET|POST','/monthlycontributions-pending',function(){
      include 'views/monthlycontributions-pending.php';
   });

   //approve-member-contributions
   $router->map('GET|POST','/approve-member-contributions',function(){
       echo Contributions::approveContribution();
   });

    //monthlycontributions-approved
    $router->map('GET|POST','/monthlycontributions-approved',function(){
      include 'views/monthlycontributions-approved.php';
   });

   //member-loan-application
   $router->map('GET|POST','/member-loan-application',function(){
      include 'views/member-loan-application.php';
   });

    //my-loans
    $router->map('GET|POST','/my-loans',function(){
      include 'views/myloans.php';
   });

   //member-repay-loan
   $router->map('GET|POST','/member-repay-loan',function(){
      include 'views/member-repay-loan.php';
   });

    //member-loanhistory
    $router->map('GET|POST','/member-loanhistory',function(){
      include 'views/member-loanhistory.php';
   });

   // pendingloans
   $router->map('GET|POST','/pendingloans',function(){
      include 'views/pendingloans.php';
   });

   //approvedloans
   $router->map('GET|POST','/approvedloans',function(){
      include 'views/approvedloans.php';
   });

   //approveloans
   $router->map('GET|POST','/approveloans',function(){
      echo Loans::validateLoan();
   });

   //loanrepayments
   $router->map('GET|POST','/loanrepayments',function(){
      include 'views/repaymentshistory.php';
   });

   //home
   $router->map('GET|POST','/home',function(){
      include 'views/home.php';
  });

  //about
  $router->map('GET|POST','/about',function(){
   include 'views/about.php';
   });

   //services
   $router->map('GET|POST','/services',function(){
      include 'views/services.php';
   });


    //end routes
    $match= $router->match();
//condition to handel the routes
    if($match && is_callable($match['target'])){
        call_user_func_array($match['target'],$match['params']);
    }else{
        echo '404 Route Not Found ';
    }
?>
