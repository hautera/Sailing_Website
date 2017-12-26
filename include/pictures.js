//const firebase = require("firebase");
// Required for side-effects (according to google idk if ittll woorrrrk)
//require("firebase/firestore");

/*MIGHT NOT NEED THIS BECAUSE OF THE HEADER*/
/*ITS NOT THROWING ERRORS SO DONT CHANGE IT :)*
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
*/


/**
 * Puts image from firestorage onto page
 * @param picPath the place the image is stored in firestore, if not correct
 * @param albumID The name of the album to be displayed
 *@param album_name The public-facing name of the album
 * this function logs an error to console
 */
function display( picPath, albumID, album_name ){
   var path = "pictures/" +picPath
   //Instalize the variables :)
   var storage = firebase.storage();
   var storageRef = storage.ref();
   var picRef = storageRef.child(path);
   picRef.getDownloadURL().then( function( URL ){
         document.getElementById("pic").innerHTML += "<div class ='image_box'><a href='/pictures/albums?album="+albumID+"' class='album_link'><h3 class='img_caption'>"+album_name+"</h3><img src=\"" +URL+"\" class='smoll_img'/></a></div>";
   }).catch( function( error){
      console.error( "Path might be invalid", error.message );
   });
}


var dir = window.location + "";

$.ajax({
    //This will retrieve the contents of the folder if the folder is configured as 'browsable'
    url: dir,
    success: function (data) {
      console.log( data );

   }
});

/*
db.collection('pictures').get().then(
   function( albums ){
      albums.forEach( function( album ) {    //chooses first picture from album; and sends that to page for display
      if( album != null ){
         var pic = album.data().pics[0];
         var name = album.data().album_name;
         display( album.id + "/"+pic, album.id, name);
      } else {    // error log
         console.log( "Balls!");
      }
   });
}).catch(
   function(e) {
      console.error("Problem retrieving data!", e.message);
   }
);
*/
