async function getUserRequests(userId) {
  return await fetch("http://demo1/php/get_requests.php?user_id=" + userId)
    .then((response) => response.json())
    .then((data) => data);
}
