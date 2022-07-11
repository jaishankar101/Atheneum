const createNav = () => {
  let navbar = document.querySelector(".navbar");

  navbar.innerHTML = `
  <div class="container flex-wrap"><a class="mx-auto navbar-brand size_lg text-primary" href="index.html"><img src="img/Atheneum.png" class="brand-logo" alt="" /></a>
                <hr class="w-100 my-1"/> 
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown-11" aria-controls="navbarNavDropdown-11" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> 
                </button>   
                <button href="Bag.html" class="btn btn-outline-primary border-0 py-2 order-lg-1" type="button" aria-label="backpack"> 
                    <a href="Bag.html" class="before_acc"><img src="img/backpack.png" alt="" title="Collection" style="width: 30px" /></a>
                </button>   
                        
                <div class="collapse navbar-collapse" id="navbarNavDropdown-11"> 
                    <ul class="navbar-nav"> 
                        <li class="nav-item"> <a class="nav-link px-lg-3 py-lg-3" href="index.html">Home</a> 
                        </li>                         
                        <li class="nav-item"> <a class="nav-link px-lg-3 py-lg-3"  href="#team">About Us</a> 
                        </li>                         
                        <li class="nav-item"> <a class="nav-link px-lg-3 py-lg-3" href="#books">Books</a> 
                        </li>                         
                        <li class="nav-item dropdown"> <a class="nav-link px-lg-3 py-lg-3 dropdown-toggle" href="donate-book.html" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services </a> 
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink"> <a class="dropdown-item" href="#">Renewal</a> <a class="dropdown-item" href="donate-book.html">Donate Books</a> <a class="dropdown-item" href="#">Pervious year papers</a> 
                            </div>                             
                        </li>                         
                        <li class="nav-item"> <a class="nav-link px-lg-3 py-lg-3" href="#contact">Contact Us</a>
                            <li class="nav-item"> <a class="nav-link px-lg-3 py-lg-3" id="myLoginBtn">Login/Register</a>
                        </li>                         
                    </ul>
                    <button onclick="topFunction()" id="myBtn" title="Go to top">⬆</button>
                    <div id="id01" class="popup-form" style="display: none;">
                        <div
                          class="form-content"
                          style="max-width: 600px"
                        >
                          <div class="form-top ">
                            <br />
                            <button onclick="document.getElementById('id01').style.display='none'" class="close-modal" title="Close Modal">&times;</button>
                            
                            <img
                              src="img/img_avatar4.png"
                              alt="Avatar"
                              height="70" width="70"
                              class="avatar"
                            />
                          </div>
                  
                          <form class="subscribe" >
                            <label for="user_id">USER NAME</label>
                            <input type="text" id="user_name" name="user_name" placeholder="username..." title="user_name" required/>
                            <label for="password">Enter Password</label>
                            <input
                              type="password"
                              id="password"
                              name="password"
                              placeholder="password..."
                              title="PASSWORD"
                              required
                            />
                            
                            <input
                              type="checkbox"
                              class="rememberMe"
                              name="rememberMe"
                              value="true"
                              tabindex="0"
                              data-uia="rememberMe"
                              checked=""
                            />
                            <span class="rememberMe_text">Remember me</span>
                            
                            <a class="forgotpwd" href="forgotpassword.html">forgot password?</a>
                            <div class="submit">
                            <button type="submit" id="login-form-submit" value="Login"
                             onclick="login()">Login</button>
                    
                            </div>
                            
                          </form>
                           <p>do not have a account?<a href="register.html">Register</a></p>
                           </div>
                  
                        </div> 
                           
                </div>                 
            </div>
    `;
};

createNav();

let mybutton = document.getElementById("myBtn");
let myLoginbtn = document.getElementById("myLoginBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
    navbar.style.top = "50px";
  } else {
    mybutton.style.display = "none";
  }
}

myLoginbtn.onclick = function () {
  document.getElementById("id01").style.display = "block";
};

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

let subscribe = document.querySelector(".subscribe");

function login() {
  const username = subscribe.user_name.value;
  const password = subscribe.password.value;

  if (username === "bmsce" && password === "iamgod") {
    location.href = "index.html";
    myLoginbtn.classList.add(".hidden");
  } else {
    alert("ENTERED INFORMATION IS WRONG!");
  }
}
