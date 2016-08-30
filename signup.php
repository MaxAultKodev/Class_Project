<?php

// If user is logged in, header them away
if (isset($_SESSION["username"])) {
    header("location: message.php?msg=NO to that weenis");
    exit();
}
?><?php
// Ajax calls this NAME CHECK code to execute
if (isset($_POST["usernamecheck"])) {
    include_once("includes/db_conx.php");
    $username = preg_replace('#[^a-z0-9]#i', '', $_POST['usernamecheck']);
    $sql = "SELECT id FROM users WHERE username='$username' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
    $uname_check = mysqli_num_rows($query);
    if (strlen($username) < 3 || strlen($username) > 16) {
        echo '<strong style="color:#F00;">3 - 16 characters please</strong>';
        exit();
    }
    if (is_numeric($username[0])) {
        echo '<strong style="color:#F00;">Usernames must begin with a letter</strong>';
        exit();
    }
    if ($uname_check < 1) {
        echo '<strong style="color:#009900;">' . $username . ' is OK</strong>';
        exit();
    } else {
        echo '<strong style="color:#F00;">' . $username . ' is taken</strong>';
        exit();
    }
}
?><?php
// Ajax calls this REGISTRATION code to execute
if (isset($_POST["u"])) {
    // CONNECT TO THE DATABASE
    include_once("includes/db_conx.php");
    // GATHER THE POSTED DATA INTO LOCAL VARIABLES
    $u = preg_replace('#[^a-z0-9]#i', '', $_POST['u']);
    $e = mysqli_real_escape_string($db_conx, $_POST['e']);
    $p = $_POST['p'];
    $g = preg_replace('#[^a-z]#', '', $_POST['g']);
    $c = preg_replace('#[^a-z ]#i', '', $_POST['c']);
    // GET USER IP ADDRESS
    $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));
    // DUPLICATE DATA CHECKS FOR USERNAME AND EMAIL
    $sql = "SELECT id FROM users WHERE username='$u' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
    $u_check = mysqli_num_rows($query);
    // -------------------------------------------
    $sql = "SELECT id FROM users WHERE email='$e' LIMIT 1";
    $query = mysqli_query($db_conx, $sql);
    $e_check = mysqli_num_rows($query);
    // FORM DATA ERROR HANDLING
    if ($u == "" || $e == "" || $p == "" || $g == "" || $c == "") {
        echo "The form submission is missing values.";
        exit();
    } else if ($u_check > 0) {
        echo "The username you entered is alreay taken";
        exit();
    } else if ($e_check > 0) {
        echo "That email address is already in use in the system";
        exit();
    } else if (strlen($u) < 3 || strlen($u) > 16) {
        echo "Username must be between 3 and 16 characters";
        exit();
    } else if (is_numeric($u[0])) {
        echo 'Username cannot begin with a number';
        exit();
    } else {
        // END FORM DATA ERROR HANDLING
        // Begin Insertion of data into the database
        // Hash the password and apply your own mysterious unique salt
        $p_hash = md5($p);
        // Add user info into the database table for the main site table
        $sql = "INSERT INTO users (username, email, password, gender, country, ip, signup, lastlogin, notescheck)       
		        VALUES('$u','$e','$p_hash','$g','$c','$ip',now(),now(),now())";
        $query = mysqli_query($db_conx, $sql);
        $uid = mysqli_insert_id($db_conx);
        // Establish their row in the useroptions table
        $sql = "INSERT INTO useroptions (id, username, background) VALUES ('$uid','$u','original')";
        $query = mysqli_query($db_conx, $sql);
        // Create directory(folder) to hold each user's files(pics, MP3s, etc.)
        if (!file_exists("user/$u")) {
            mkdir("user/$u", 0755);
        }
        // Email the user their activation link
        $to = "$e";
        $from = "noreply@kodevstudios.com";
        $subject = 'Kodev Activation';
        $message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Kodev Message</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;"><a href="http://www.kodevstudios.com"><img src="http://kodevstudios.com/images/wannafightaboutit.jpg" width="36" height="30" alt="P2P Gig" style="border:none; float:left;"></a>Kodev Account Activation</div><div style="padding:24px; font-size:17px;">Hello ' . $u . ',<br /><br />Click the link below to activate your account when ready:<br /><br /><a href="http://www.kodevstudios.com/activation.php?id=' . $uid . '&u=' . $u . '&e=' . $e . '&p=' . $p_hash . '">Click here to activate your account now</a><br /><br />Login after successful activation using your:<br />* E-mail Address: <b>' . $e . '</b></div></body></html>';
        $headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
        mail($to, $subject, $message, $headers);
        echo "signup_success";
        exit();
    }
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sign Up</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="css/main.css">
        <style type="text/css">
            #signupform{
                margin-top:66px;	
            }
            #signupform > div {
                margin-top: 12px;	
            }
            #signupform > input,select {
                width: 200px;
                padding: 3px;
                background: #F3F9DD;
            }
            #signupbtn {
                font-size:18px;
                padding: 12px;
            }
            #terms {
                border:#CCC 1px solid;
                background: #F5F5F5;
                padding: 12px;
            }
        </style>
        <script src="js/main.js"></script>
        <script src="js/ajax.js"></script>
        <script>
            function restrict(elem) {
                var tf = _(elem);
                var rx = new RegExp;
                if (elem == "email") {
                    rx = /[' "]/gi;
                } else if (elem == "username") {
                    rx = /[^a-z0-9]/gi;
                }
                tf.value = tf.value.replace(rx, "");
            }
            function emptyElement(x) {
                _(x).innerHTML = "";
            }
            function checkusername() {
                var u = _("username").value;
                if (u != "") {
                    _("unamestatus").innerHTML = 'checking ...';
                    var ajax = ajaxObj("POST", "signup.php");
                    ajax.onreadystatechange = function () {
                        if (ajaxReturn(ajax) == true) {
                            _("unamestatus").innerHTML = ajax.responseText;
                        }
                    }
                    ajax.send("usernamecheck=" + u);
                }
            }
            function signup() {
                var u = _("username").value;
                var e = _("email").value;
                var p1 = _("pass1").value;
                var p2 = _("pass2").value;
                var c = _("country").value;
                var g = _("gender").value;
                var status = _("status");
                if (u == "" || e == "" || p1 == "" || p2 == "" || c == "" || g == "") {
                    status.innerHTML = "Fill out all of the form data";
                } else if (p1 != p2) {
                    status.innerHTML = "Your password fields do not match";
                } else if (_("terms").style.display == "none") {
                    status.innerHTML = "Please view the terms of use";
                } else {
                    _("signupbtn").style.display = "none";
                    status.innerHTML = 'please wait ...';
                    var ajax = ajaxObj("POST", "signup.php");
                    ajax.onreadystatechange = function () {
                        if (ajaxReturn(ajax) == true) {
                            if (ajax.responseText != "signup_success") {
                                status.innerHTML = ajax.responseText;
                                //_("signupbtn").style.display = "block";
                            } else {
                                window.scrollTo(0, 0);
                                _("signupform").innerHTML = "OK " + u + ", check your email inbox and junk mail box at <u>" + e + "</u> in a moment to complete the sign up process by activating your account. You will not be able to do anything on the site until you successfully activate your account.";
                            }
                        }
                    }
                    ajax.send("u=" + u + "&e=" + e + "&p=" + p1 + "&c=" + c + "&g=" + g);
                }
            }
            function openTerms() {
                _("terms").style.display = "block";
                emptyElement("status");
            }
            /* function addEvents(){
             _("elemID").addEventListener("click", func, false);
             }
             window.onload = addEvents; */
        </script>
    </head>
    <body>
        <?php include_once("includes/header.php"); ?>
        <div id="pageMiddle">
            <h3>Sign Up Here</h3>
            <form name="signupform" id="signupform" onsubmit="return false;">
                <div>Username: </div>
                <input id="username" type="text" onblur="checkusername()" onkeyup="restrict('username')" maxlength="16">
                <span id="unamestatus"></span>
                <div>Email Address:</div>
                <input id="email" type="text" onfocus="emptyElement('status')" onkeyup="restrict('email')" maxlength="88">
                <div>Create Password:</div>
                <input id="pass1" type="password" onfocus="emptyElement('status')" maxlength="16">
                <div>Confirm Password:</div>
                <input id="pass2" type="password" onfocus="emptyElement('status')" maxlength="16">
                <div>Gender:</div>
                <select id="gender" onfocus="emptyElement('status')">
                    <option value=""></option>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                </select>
                <div>Country:</div>
                <select id="country" onfocus="emptyElement('status')">
                    <?php include_once("template_country_list.php"); ?>
                </select>
                <div>
                    <a href="#" onclick="return false" onmousedown="openTerms()">
                        View the Terms Of Use
                    </a>
                </div>
                <div id="terms" style="display:none;">
                    
<h2>
	Web Site Terms and Conditions of Use
</h2>

<h3>
	1. Terms
</h3>

<p>
	By accessing this web site, you are agreeing to be bound by these 
	web site Terms and Conditions of Use, all applicable laws and regulations, 
	and agree that you are responsible for compliance with any applicable local 
	laws. If you do not agree with any of these terms, you are prohibited from 
	using or accessing this site. The materials contained in this web site are 
	protected by applicable copyright and trade mark law. Upon acceptance of these
        terms, you hereby waive your obligation of grading this project, in lieu of a
        100% on the remaining portions of the project.  
</p>

<h3>
	2. Use License
</h3>

<ol type="a">
	<li>
		Permission is granted to temporarily download one copy of the materials 
		(information or software) on Not Too Worried / Gig City's web site for personal, 
		non-commercial transitory viewing only. This is the grant of a license, 
		not a transfer of title, and under this license you may not:
		
		<ol type="i">
			<li>modify or copy the materials;</li>
			<li>use the materials for any commercial purpose, or for any public display (commercial or non-commercial);</li>
			<li>attempt to decompile or reverse engineer any software contained on Not Too Worried / Gig City's web site;</li>
			<li>remove any copyright or other proprietary notations from the materials; or</li>
			<li>transfer the materials to another person or "mirror" the materials on any other server.</li>
		</ol>
	</li>
	<li>
		This license shall automatically terminate if you violate any of these restrictions and may be terminated by Not Too Worried / Gig City at any time. Upon terminating your viewing of these materials or upon the termination of this license, you must destroy any downloaded materials in your possession whether in electronic or printed format.
	</li>
</ol>

<h3>
	3. Disclaimer
</h3>

<ol type="a">
	<li>
		The materials on Not Too Worried / Gig City's web site are provided "as is". Not Too Worried / Gig City makes no warranties, expressed or implied, and hereby disclaims and negates all other warranties, including without limitation, implied warranties or conditions of merchantability, fitness for a particular purpose, or non-infringement of intellectual property or other violation of rights. Further, Not Too Worried / Gig City does not warrant or make any representations concerning the accuracy, likely results, or reliability of the use of the materials on its Internet web site or otherwise relating to such materials or on any sites linked to this site.
	</li>
</ol>

<h3>
	4. Limitations
</h3>

<p>
	In no event shall Not Too Worried / Gig City or its suppliers be liable for any damages (including, without limitation, damages for loss of data or profit, or due to business interruption,) arising out of the use or inability to use the materials on Not Too Worried / Gig City's Internet site, even if Not Too Worried / Gig City or a Not Too Worried / Gig City authorized representative has been notified orally or in writing of the possibility of such damage. Because some jurisdictions do not allow limitations on implied warranties, or limitations of liability for consequential or incidental damages, these limitations may not apply to you.
</p>
			
<h3>
	5. Revisions and Errata
</h3>

<p>
	The materials appearing on Not Too Worried / Gig City's web site could include technical, typographical, or photographic errors. Not Too Worried / Gig City does not warrant that any of the materials on its web site are accurate, complete, or current. Not Too Worried / Gig City may make changes to the materials contained on its web site at any time without notice. Not Too Worried / Gig City does not, however, make any commitment to update the materials.
</p>

<h3>
	6. Links
</h3>

<p>
	Not Too Worried / Gig City has not reviewed all of the sites linked to its Internet web site and is not responsible for the contents of any such linked site. The inclusion of any link does not imply endorsement by Not Too Worried / Gig City of the site. Use of any such linked web site is at the user's own risk.
</p>

<h3>
	7. Site Terms of Use Modifications
</h3>

<p>
	Not Too Worried / Gig City may revise these terms of use for its web site at any time without notice. By using this web site you are agreeing to be bound by the then current version of these Terms and Conditions of Use.
</p>

<h3>
	8. Governing Law
</h3>

<p>
	Any claim relating to Not Too Worried / Gig City's web site shall be governed by the laws of the State of Tennessee without regard to its conflict of law provisions.
</p>

<p>
	General Terms and Conditions applicable to Use of a Web Site.
</p>



<h2>
	Privacy Policy
</h2>

<p>
	Your privacy is very important to us. Accordingly, we have developed this Policy in order for you to understand how we collect, use, communicate and disclose and make use of personal information. The following outlines our privacy policy.
</p>

<ul>
	<li>
		Before or at the time of collecting personal information, we will identify the purposes for which information is being collected.
	</li>
	<li>
		We will collect and use of personal information solely with the objective of fulfilling those purposes specified by us and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.		
	</li>
	<li>
		We will only retain personal information as long as necessary for the fulfillment of those purposes. 
	</li>
	<li>
		We will collect personal information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned. 
	</li>
	<li>
		Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and up-to-date. 
	</li>
	<li>
		We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.
	</li>
	<li>
		We will make readily available to customers information about our policies and practices relating to the management of personal information. 
	</li>
</ul>

<p>
	We are committed to conducting our business in accordance with these principles in order to ensure that the confidentiality of personal information is protected and maintained. 
</p>		

			
                </div>
                <br /><br />
                <button id="signupbtn" onclick="signup()">Create Account</button>
                <span id="status"></span>
            </form>
        </div>
        <?php include_once("includes/footer.php"); ?>
    </body>
</html>