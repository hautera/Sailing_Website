//config firebase
if (!firebase.apps.length) {
   var config = {
         apiKey: "AIzaSyCQotoFvcv3aqsAtusH9ynOgGalusrnT9g",
         authDomain: "husky-sailing-site.firebaseapp.com",
         databaseURL: "https://husky-sailing-site.firebaseio.com",
         projectId: "husky-sailing-site",
         storageBucket: "husky-sailing-site.appspot.com",
         messagingSenderId: "653011603129"
   };

   firebase.initializeApp(config);
}


btnLogin = document.getElementById("submit");


/**
 * Signs a user in after they submit their
 * sign in info on a click :)
 */
 btnLogin.addEventListener('click', e => {
   //get user info

var userEmail = document.getElementById("email").value;
var userPwd = document.getElementById("pwd").value;


   console.log(userEmail);
   console.log(userPwd);
   const auth = firebase.auth();

   //debug, maybe don't publish this to internet
   //console.log( userEmail );
   //console.log( userPwd );

   auth.signInWithEmailAndPassword( userEmail, userPwd )
   .then( user => {
      window.location.replace("/uwsails/account/");
      //for when we make a signin window
   })
   .catch( e => {
      if(window.location.pathname === "/uwsails/signin/"){
         document.getElementById("error-text").innerHTML = "ERROR SIGNING IN";
         console.error(e.message);
      } else {
         document.location.replace("/uwsails/signin/")
      }
   });
});
