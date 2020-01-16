<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">
<head>
<!-- start: Meta -->
<meta charset="utf-8">
<title>Google Sign-in using Javascript, PHP and MYSQL - W3lessons.info</title> 
<meta name="description" content="Google has several login methods based on the devices like iOS, Android and Web. Here we are going to Implement this login system for Website. Millions of Websites and Apps are implemented Google Login into their sites to increase the registrations. I hope this simple tutorial will help you to implement in your PHP web based projects "/>
<meta name="keywords" content="Google+ ajax login, Google oauth login, Google javascript login, PHP FB login System" />
<meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1"/>
<!-- end: Meta -->

<!-- start: Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- end: Mobile Specific -->

<meta name="google-signin-client_id" content="1072350016655-d2ltgqlgtqgcqccv9qn32paoa3k7ja01.apps.googleusercontent.com">
<meta name="google-signin-cookiepolicy" content="single_host_origin" />

<!-- start: Facebook Open Graph -->
<meta property="og:title" content="Google OAuth2.0 Login using jQuery, PHP and MYSQL"/>
<meta property="og:description" content="Google has several login methods based on the devices like iOS, Android and Web. Here we are going to Implement this login system for Website. Millions of Websites and Apps are implemented Google Login into their sites to increase the registrations. I hope this simple tutorial will help you to implement in your PHP web based projects"/>
<meta property="og:type" content="website"/>
<meta property="og:url" content="http://localhost/demo/google_api/single/index.php"/>
<meta property="og:image" content="http://w3lessons.info/wp-content/uploads/2015/05/google.png"/>
<!-- end: Facebook Open Graph -->

<style type="text/css">
.Glogout-link { font-weight: bold; font-size: 18px}
#google_profile_box{ display: none; width: 400px; margin: 0 auto;}
#Gimg { text-align: left;}
.container { background: #fff; width: 80%; margin: 20px auto;}
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
</head>
<body>

<center>
    <script id="mNCC" language="javascript">
    medianet_width = "728";
    medianet_height = "90";
    medianet_crid = "784430518";
    medianet_versionId = "3111299"; 
  </script>
<script src="//contextual.media.net/nmedianet.js?cid=8CU65ZB5M"></script>
</center>

<div class="container">

  <h1>Google OAuth Ajax Login - W3lessons.info</h1>

<div id="status"></div>

<div id="google_login_box">
<div class="g-signin2" data-longtitle="true" data-onsuccess="Google_signIn" data-theme="dark" data-width="200"></div>
</div>

<div id="google_profile_box">
<p id="Gimg"></p>
<p id="Gname" class="fbtext"></p>
<p id="Gemail" class="fbtext"></p>
<p id="Gid" class="fbtext"></p>
<p class="Glogout-link"><a href="javascript:;" onclick="GoogleLogout();" style="cursor:pointer">Logout from Google</a></p>
</div>

<br/><br/><br/>
<table>
<tr>
<td>
<center>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- GE - Post Page -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-5104998679826243"
     data-ad-slot="2329978170"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</center>
</td>
<td>
<center>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Post Page1 - Responsive -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-5104998679826243"
     data-ad-slot="6424151376"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</center>
</td>
</tr>
</table>


<div id="fb_download">
  <h2>Download script for subscribed users only!</h2>
  <table>
  <tr>
  <td>Enter your email : </td><td><input type="text" style="width:200px; padding:2px;" name="sub_email" id="itzurkarthi_email" value=""></td><td><input class="uibutton s_download" type="button" value="Download"></td>
  </tr>
  </table>
  
  <div id="down_update" style="padding:5px;"> </div>
  
  <h2>New users please subscribe here!</h2>
  <form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=nextweb2', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
   <table>
  <tr>
  <td>Enter your email :</td><td><input type="text" style="width:200px; padding:2px;" name="email"/><input type="hidden" value="nextweb2" name="uri"/><input type="hidden" name="loc" value="en_US"/></td><td><input type="submit" class="uibutton" value="Subscribe" /></td>
  </tr>
  <tr>
  <td colspan="3" align="center"><p><a href="http://feeds.feedburner.com/nextweb2"><img src="http://feeds.feedburner.com/~fc/nextweb2?bg=99CCFF&amp;fg=444444&amp;anim=0" height="26" width="88" style="border:0" alt="" /></a></p></td>
  </tr>
  </table>
  </form>
  
  <p><font color="#FF0000">Note</font> : New subscribers email data will be updated every 10 hours</p>
  
  
  </div>

</div>

<center><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- New Ad W3lessons -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-5104998679826243"
     data-ad-slot="5056350578"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
Powered by <a href="http://w3lessons.info" target="_blank">W3lessons.info</a>
</center>
<script>

function Google_signIn(googleData) 
{
    var profile = googleData.getBasicProfile(); //get google profile details
    $('#google_profile_box').show();
    $('#google_login_box').hide();

    $('#Gname').text("Name : "+profile.getName());
    $('#Gemail').text("Email : "+profile.getEmail());
    $('#Gimg').html("<img src='"+profile.getImageUrl()+"'>");
    $('#Gid').text("Google ID : "+profile.getId());

    //update to database
    update_user_data(profile);
}


function update_user_data(response) 
{
      $.ajax({
            type: "POST",
            dataType: 'json',
            data: response,
            url: 'check_user.php',
            success: function(msg) {
               if(msg.error== 1)
               {
                alert('Something Went Wrong!');
               }
            }
      });
}

$(window).load(function() {
  var cc =  gapi.auth2.getAuthInstance();
  var check_sign_in = cc.isSignedIn.get()
  //alert(check_sign_in); //check already loggedIn or Not - return true / false
});

  function GoogleLogout()
  {

    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
          $('#google_login_box').show();
          $('#google_profile_box').hide();
    });
  }


jQuery(function(){
jQuery('.s_download').live("click", function(e) {
      var semail = jQuery("#itzurkarthi_email").val();
      if(semail == '')
      {
        alert('Enter Email');
        return false;
      }
      var str = "sub_email="+semail
      jQuery.ajax({
        type: "POST",
        url: "download.php",
        data: str,
        cache: false,
        success: function(htmld){
            jQuery('#down_update').html(htmld);
        }
      });
    }); 
});  
</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5208e2cf54cfbd32" async="async"></script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-27820211-3', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>