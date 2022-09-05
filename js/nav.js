const createNav = () => {
  let navbar = document.querySelector(".navbar");

  navbar.innerHTML = `
  <div class="container flex-wrap"><a class="mx-auto navbar-brand size_lg text-primary" href="index.html"><img src="img/Atheneum.png" class="brand-logo" alt="" /></a>
                <hr class="w-100 my-1"/> 
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown-11" aria-controls="navbarNavDropdown-11" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> 
                </button>   
                        
                <div class="collapse navbar-collapse" id="navbarNavDropdown-11"> 
                    <ul class="navbar-nav"> 
                        <li class="nav-item"> <a class="nav-link px-lg-3 py-lg-3" href="index.html">Home</a> 
                        </li>                         
                        <li class="nav-item"> <a class="nav-link px-lg-3 py-lg-3"  href="#team">About Us</a> 
                        </li>                         
                        <li class="nav-item"> <a class="nav-link px-lg-3 py-lg-3" href="#login">Log-In</a> 
                        </li>
                        <li class="nav-item"> <a class="nav-link px-lg-3 py-lg-3" href="donate-book.html">Donate Books</a> 
                        </li>                         
                        <li class="nav-item"> <a class="nav-link px-lg-3 py-lg-3" href="#contact">Contact Us</a></li>                     
                    </ul>
                    <button onclick="topFunction()" id="myBtn" title="Go to top">⬆</button>
                   </div>        
            </div>
    `;
};

createNav();

let mybutton = document.getElementById("myBtn");

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

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

let subscribe = document.querySelector(".subscribe");
