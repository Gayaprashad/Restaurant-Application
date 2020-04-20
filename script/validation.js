const name = document.getElementById('name');
const password= document.getElementById('password');
const status= document.getElementById('status');
let orpass=  document.getElementById('orpass');
let orname=  document.getElementById('orname');
const form = document.getElementById('form');

form.addEventListener("submit",function(e){// console.log(orpass.textContent);


  console.log(orpass.textContent);
  if (orpass.textContent=='0'){
    parent= password.parentElement;
    parent.classList.add("error");
    parent.children[2].textContent=`The password is incorrect.`;
    console.log("password is incorrect");
    e.preventDefault();
  }else if (orpass.textContent=='1'){
    parent= password.parentElement;
    parent.classList.remove("error");
    parent.children[2].textContent=`The password is incorrect.`;
  }

  if (orname.textContent=='0'){
    parent= name.parentElement;
    parent.classList.add("error");
    parent.children[2].textContent=`The User name is incorrect.`;
    console.log("username is incorrect");
    e.preventDefault();
  }else if (orname.textContent=='1'){
    parent= name.parentElement;
    parent.classList.remove("error");
    parent.children[2].textContent=`The User name is incorrect.`;
  }
  console.log("nanana");
});
