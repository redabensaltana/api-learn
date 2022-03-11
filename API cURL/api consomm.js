////////////!ADD/////////////

const game = {
    name: "test",
    genre: "test",
    autor: "ea",
    release_date: "2010-6-6"
};

const options = {
method: 'POST',
headers: {
'Content-Type': 'application/json',
},
body: JSON.stringify(game),
};
fetch('http://localhost/api-learn/API%20cURL/api/games/addgame.php', options) 

//////////////!READ//////////

fetch('http://localhost/api-learn/API%20cURL/api/games/getgames.php')

fetch('http://localhost/api-learn/API%20cURL/api/games/getgames.php')
.then(data => {
return data.json();
})
.then(post => {
console.log(post);
});
// fetch("http://dummy.restapiexample.com/api/v1/employees")
// .then( (response) => response.json())
// .then((data)=> console.log(data))// output will be the required data
// .catch( (error) => console.log(error))
