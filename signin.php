<?php 
		require 'dbconnect.php';
		session_start();

		$email = $_POST['email'];
		$password = $_POST['password'];


		$sql = "SELECT users.*, roles.name as rname  FROM users LEFT JOIN roles ON users.role_id = roles.id WHERE email=:email AND password=:password";
		$stmt= $conn->prepare($sql);
		$stmt->bindParam(':email',$email);
		$stmt->bindParam(':password',$password);
		$stmt->execute();

		if($stmt->rowCount() <= 0)
		{

    

        if(!isset($_COOKIE['loginCount'])){
			$i=1;

		}else
                {
                        $i=$_COOKIE['loginCount'];
                        $i++;
                }
                setcookie('loginCount',$i,time()+10);
                if($i>=1){
                        echo "
                        <img src='image/tenor.gif' 
                        style=' object-fit:cover;'>
                        
                        ";
                         setcookie('loginCount','',time()-10);
                        echo " 
                                <script type=\"text/javascript\">
                                (function(){
                                        setTimeout(function(){
                                                location.href='login.php';
                                                },10000);
                                        })();
                                </script>";
                        
                       
                }else{
                       $_SESSION['reg_fail']='Sign-in again bitch 👤';
                        header("Location:login.php");  
                }
        }

        else
        { 

        	$user = $stmt->fetch(PDO::FETCH_ASSOC);
        	//var_dump($user);die();

        	$_SESSION['loginuser'] = $user;

        	$roleid= $user['role_id'];
        	if($roleid == 1)
        	{
        		header('location:categorylist.php');
        	}
        	else
        	{
        		{
        		header('location:index.php');
        	}
        	}
        }
		

 ?>