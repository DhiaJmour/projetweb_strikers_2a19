<?PHP
include "../entities/employe.php";
include "../core/employeC.php";
session_start();
$pass=$_POST['password'];
$confpass=$_POST['Confirmpassword'];
if($pass === $confpass)
{
if (($_POST['username']!= '' )and ($_POST['email']!= '') and ($_POST['password']!= ''))
{
$Admin1=new Admin($_POST['username'],$_POST['email'],$_POST['password']);

$Admin1C=new AdminC();
$Admin1C->ajouterAdmin($Admin1);
 echo "done";
            $_SESSION['success'] =  "Admin is Added Successfully";
			
            header('Location: ../../../register.php');
        }
        else 
        {
            echo "not done";
            $_SESSION['status'] =  "Admin is Not Added";
            header('Location: ../../../register.php');
        }

}
else 
    {
        echo "pass no match";
        $_SESSION['status'] =  "Password and Confirm Password Does not Match";
       header('Location: ../../../register.php');
    }
//*/

?>