const parentContainer =  document.querySelector('.read-more-container');

parentContainer.addEventListener('click', event=>{

    const current = event.target;

    const isReadMoreBtn = current.className.includes('read-more-btn');

    if(!isReadMoreBtn) return;

    const currentText = event.target.parentNode.querySelector('.read-more-text');

    currentText.classList.toggle('read-more-text--show');

    current.textContent = current.textContent.includes('Read More') ? "Read Less..." : "Read More...";

})

let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}

const form = document.getElementById('contactForm');
    const nameInput = document.getElementById('name');
    const emailInput = document.getElementById('email');
    const messageInput = document.getElementById('message');
    const nameError = document.getElementById('nameError');
    const emailError = document.getElementById('emailError');
    const messageError = document.getElementById('messageError');

    form.addEventListener('submit', function(event) {
      // Reset error messages
      nameError.textContent = '';
      emailError.textContent = '';
      messageError.textContent = '';

      // Validate inputs
      let isValid = true;

      if (nameInput.value.trim() === '') {
        nameError.textContent = 'Name is required';
        isValid = false;
      }

      if (emailInput.value.trim() === '') {
        emailError.textContent = 'Email is required';
        isValid = false;
      } else if (!isValidEmail(emailInput.value)) {
        emailError.textContent = 'Invalid email format';
        isValid = false;
      }

      if (messageInput.value.trim() === '') {
        messageError.textContent = 'Message is required';
        isValid = false;
      }

      if (!isValid) {
        event.preventDefault(); // Prevent form submission
      }
    });

    function isValidEmail(email) {
      // Simple email validation regex
      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
    const navLinks = document.querySelectorAll("nav ul li a");
    const sections = document.querySelectorAll("section");
    
    navLinks.forEach(link => {
      link.addEventListener("click", e => {
        e.preventDefault();
        const targetId = link.getAttribute("href").slice(1);
        const targetSection = document.getElementById(targetId);
    
        // Scroll to the target section
        targetSection.scrollIntoView({
          behavior: "smooth"
        });
    
        // Add the fade-in animation to the target section
        targetSection.classList.add("fade-in");
    
        // Remove the fade-in animation from the other sections
        sections.forEach(section => {
          if (section !== targetSection) {
            section.classList.remove("fade-in");
          }
        });
      });
    });

    window.addEventListener("load",()=>{
      typeWriter()
  })
  
  
  var i = 0;
  var text = 'Yiannis Chryssomallis (yaani)';
  var speed = 100;
  
  function typeWriter() {
      if (i < text.length) {
          document.getElementById("heading").innerHTML += text.charAt(i);
          i++;
          setTimeout(typeWriter, speed);
      }
  }
    
