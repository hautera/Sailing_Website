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

firebase.auth().onAuthStateChanged(
function(user) {
	 if (!user) {
		window.location.replace("/signin/");
	 }
});
