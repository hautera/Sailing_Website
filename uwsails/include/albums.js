
//const firebase = require("firebase");
// Required for side-effects (according to google idk if ittll woorrrrk)
//require("firebase/firestore");

/*MIGHT NOT NEED THIS BECAUSE OF THE HEADER*/
/*ITS NOT THROWING ERRORS SO DONT CHANGE IT :)*/
var config = {
    apiKey: "AIzaSyCQotoFvcv3aqsAtusH9ynOgGalusrnT9g",
    authDomain: "husky-sailing-site.firebaseapp.com",
    databaseURL: "https://husky-sailing-site.firebaseio.com",
    projectId: "husky-sailing-site",
    storageBucket: "husky-sailing-site.appspot.com",
    messagingSenderId: "653011603129"
  };
firebase.initializeApp(config);

//database reference :)
var db = firebase.firestore();

/**
 * Puts image from firestorage onto page
 * @param picPath the place the image is stored in firestore, if not correct
 * @param albumID The name of the album to be displayed
 * this function logs an error to console
 */
function display( picPath, albumID ){
   var path = "pictures/" +picPath
   //Instalize the variables :)
   var storage = firebase.storage();
   var storageRef = storage.ref();
   var picRef = storageRef.child(path);
   picRef.getDownloadURL().then( function( URL ){
         document.getElementById("pic").innerHTML += "<a href='/uwsails/pictures/albums.php?album="+albumID+"'><span class='imag_container'><img src=\"" +URL+"\" class='smoll_img'><h3 class='img_caption'>"+albumID+"</h3></span></a>";
   }).catch( function( error){
      console.error( "Path might be invalid", error.message );
   });
}

/*
 * Sees if there is a parameter passed thro the URL f
 * @return The parameter if found :)
 */
function getParameterByName(name, url) {
   if (!url) url = window.location.href;
   name = name.replace(/[\[\]]/g, "\\$&");
   var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
   if (!results)
      return null;
   if (!results[2])
      return '';
   return decodeURIComponent(results[2].replace(/\+/g, " "));
}

var albumID = getParameterByName("album");

var album = db.collection('pictures').doc(albumID).get().then(
   function(album) {
      if( album != null ){
         var pictures = album.data().pics;
         for( var i = 0; i < pictures.length; i += 1 ){
            display( album.id + "/"+pictures[i], "");
         }
      } else {    // error log
         console.log( "Balls!");
      }
});
