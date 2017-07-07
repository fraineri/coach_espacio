function countUsers() {
	var ajax_url = 'usersJSON.php'
	var req = new XMLHttpRequest()
}
req.open('GET', ajax_url, true)
req.send()
setInterval(countUsers(),3000
