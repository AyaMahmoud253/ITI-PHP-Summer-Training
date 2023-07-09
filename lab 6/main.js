document.addEventListener("DOMContentLoaded", function() {
    tableBody = document.getElementById("tableBody");
    fetchButton = document.getElementById("fetchButton");
    //userForm = document.getElementById("userForm");
    addButton = document.getElementById("addButton");
  
    fetchButton.addEventListener("click", function() {
      fetchData();
    });
  
    addButton.addEventListener("click", function() {
      addUser();
    });
  
    function createTable(arr) {

  
      for (var i = 0; i < arr.length; i++) {
        var newRow = document.createElement("tr");
        var cell1 = document.createElement("td");
        var cell2 = document.createElement("td");
  
        cell1.innerHTML = arr[i].name;
        cell2.innerHTML = arr[i].email;
  
        newRow.append(cell1, cell2);
        tableBody.append(newRow);
      }
    }
  
    function addUser() {
      var userNameInput = document.getElementById("userName");
      var emailInput = document.getElementById("email");
  
      var userName = userNameInput.value;
      var email = emailInput.value;

      if (userName.length <= 3) {
        alert("Name must be greater than 3 characters.");
        return;
      }
      
      var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
     if (!emailRegex.test(email)) {
        alert("Invalid email address.");
      return;
    }

      var newRow = document.createElement("tr");
      var cell1 = document.createElement("td");
      var cell2 = document.createElement("td");
  
      cell1.innerHTML = userName;
      cell2.innerHTML = email;
  
      newRow.append(cell1, cell2);
      tableBody.append(newRow);
  
    }
  
  
    function fetchData() {
      fetch('https://jsonplaceholder.typicode.com/users')
        .then(response => response.json())
        .then(json => {
          createTable(json);
        })
    }
  });
  document.addEventListener("DOMContentLoaded", function() {
    stylesButton = document.getElementById("styles");
    imageButton = document.getElementById("imageButton");
    myTable = document.getElementById("myTable");
    myImage = document.getElementById("myImage");
  
    stylesButton.addEventListener("click", function() {
      myTable.classList.toggle("highlight");
    });
  
    imageButton.addEventListener("click", function() {
      if (myImage.src.endsWith("image1.jpg")) {
        myImage.src = "image2.jpg";
      } else {
        myImage.src = "image1.jpg";
      }
    });
  });
  
  