const createFooter = () => {
  let footer = document.querySelector("footer");

  footer.innerHTML = `
    <div class="footer-content">
        <!--<img src="img/Atheneum.png" class="logo" alt="">-->
        <div class="footer-ul-container">
            <ul class="category">
                <li class="category-title">ABOUT</li>
                <li class="footer-text"><a href="#" class="footer-link">About us</a></li>
                <li class="footer-text"><a href="#" class="footer-link">Our story</a></li>
                <li class="footer-text"><a href="#" class="footer-link">Our impact</a></li>
                <li class="footer-text"><a href="#" class="footer-link">Our community</a></li>
                <li class="footer-text"><a href="#" class="footer-link">free book theory</a></li>
            </ul>
            <ul class="category">
                <li class="category-title">HELP</li>
                <li class="footer-text"><a href="#" class="footer-link">Contact us</a></li>
                <li class="footer-text"><a href="#" class="footer-link">Privacy Policy</a></li>
                <li class="footer-text"><a href="#" class="footer-link">Terms & Conditions</a></li>
                <li class="footer-text"><a href="#" class="footer-link">Guidlines</a></li>
                <li class="footer-text"><a href="#" class="footer-link">Return Policy</a></li>
                <li class="footer-text"><a href="#" class="footer-link">Proud Donors</a></li>
            </ul>
        </div>
    </div>
    <p class="footer-title">about Website</p>
    <p class="info">This is a Library-Management website designed for the Project work .The website is user interactive and still under improvement ,So, contact us with queries and issues to improve the website
    </p>
    <p class="info">support emails - jaishankar.cs20@bmsce.ac.in</p>
    <p class="info">telephone - ##### #####, ##### #####</p>
    <div class="footer-social-container">
        <!--<div>
            <a href="#" class="social-link">terms & services</a>
            <a href="#" class="social-link">privacy page</a>
        </div>-->
        <div>
            <a href="#" class="social-link">instagram</a>
            <a href="#" class="social-link">facebook</a>
            <a href="#" class="social-link">twitter</a>
        </div>
    </div>
    <p class="footer-credit">Copyrights®️-Atheneum</p>
    `;
};

createFooter();
