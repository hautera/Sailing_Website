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

var db = firebase.firestore();

firebase.auth().onAuthStateChanged(
function(user) {
	 if (user) { //checks if user is signed in :)
		 db.collection('sailors').where('email', '==', user.email ).get().then(
			function( users_info ){ //collects user info from database

			 	if(users_info.docs.length != 1 ){
					// this should never happen, it means a user signed up with the same email twice
					//or the user went through the backend to sign up :( ( @benjamin )
					console.error("Panic!");
				} else{
					//everything is working fine
					var user_info = users_info.docs[0];
					document.getElementById("welcome").innerHTML += user_info.get('name') + ":";
					var user_role = user_info.get('role'); //role specifies what the user does for the team


					switch (user_role) {
						case "Admin": //website admin
							console.log("Austin is the best :)"); //cause i am
							admin(user, user_info);
							break;

						case "Treasurer":	//team treasurer
							treasurer(user, user_info);
							break;

						case "Captain":	//team co-captain
							break;
						//TODO GIVE PEOPLES SPECIAL FEATURES
						default:
							break;

						}
				}
		 	}).catch(
			function( e ){
					console.error(e);
			});
	 }	else {
		 //panic
		 console.error("This person shouldn't be vewing this page!");
	 }
});



function admin(user, user_info){
	document.getElementById('role').innerHTML ="Site Admin";
}

function treasurer(){
	//tells them they are signed in as the treasurer
	document.getElementById('role').innerHTML ="Treasurer";

	//form for uploading a spreadsheet
	document.getElementById('upload_form_space').innerHTML =
			"<form id='upload_form'><p><strong>Upload a spreadsheet:</strong></p><input type='file'  id='sheet_to_upload' class='big-form'></input><input type='button' id='start_upload' value='Upload Sheet' class='big-btn' onclick = 'upload_spread_sheet()'></input></form>";


	var storage = firebase.storage();
	var sheets_ref = storage.ref().child("sheets/sheet.xlsx");

	//gets the download url of the sheet on the website
	var sheet_url = sheets_ref.getDownloadURL().then( url => {
		document.getElementById('upload_form_space').innerHTML +=
				"<strong><a href='" + url + "' > Download latest sheet uploaded.</a></strong>";
	}).catch( e => {
		document.getElementById('upload_form_space').innerHTML += "<strong> No sheet uploaded yet</strong>";
		console.log( e.message );
	});
}

/**
 * Uploads the file selected to the in the file selector
 * to the firebase storage server.
 * This function should only be called on the treasurer screen
 */
function upload_spread_sheet(){

	//get file
	var file = document.getElementById('sheet_to_upload').files.item(0);

	//this checks if the user is signed in :)
	if( firebase.auth().currentUser ){

		var storage = firebase.storage();
		var sheets_ref = storage.ref().child("sheets/sheet.xlsx");

		//upload the file
		sheets_ref.put( file ).then( x => {
		document.getElementById('upload_form_space').innerHTML = "<h3>File successfully uploaded!</h3>";
		});
	} else {
		//bad times something went really wrong here
		console.error("User is not signed in!");
	}
}
