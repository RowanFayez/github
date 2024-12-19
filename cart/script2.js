const bar = document.getElementById('bar');
const close = document.getElementById('close');
const nav = document.getElementById('navbar');

if (bar){
  bar.addEventListener('click', () => {
    nav.classList.add('active')
  })
}
if (close){
  close.addEventListener('click', () => {
    nav.classList.remove('active')
  })
}
function validateForm() {
  // Get form values
  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const subject = document.getElementById('subject').value;
  const message = document.getElementById('message').value;
  
  // Clear previous feedback
  const feedbackMessage = document.getElementById('feedback-message');
  feedbackMessage.innerHTML = "";

  // Check if name is empty
  if (name.trim() === "") {
      feedbackMessage.innerHTML = "Please enter your name.";
      feedbackMessage.style.color = "red";
      return false;
  }

  // Validate email format
  const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  if (!emailPattern.test(email)) {
      feedbackMessage.innerHTML = "Please enter a valid email address.";
      feedbackMessage.style.color = "red";
      return false;
  }

  // Check if subject is empty
  if (subject.trim() === "") {
      feedbackMessage.innerHTML = "Please enter a subject.";
      feedbackMessage.style.color = "red";
      return false;
  }

  // Check if message is empty
  if (message.trim() === "") {
      feedbackMessage.innerHTML = "Please enter your message.";
      feedbackMessage.style.color = "red";
      return false;
  }

  // Simulate form submission (normally this would be an AJAX request to the server)
  // Here we'll assume the form was successfully submitted if all validations pass
  setTimeout(function() {
      feedbackMessage.innerHTML = "Thank you for your message! We will get back to you soon.";
      feedbackMessage.style.color = "green";
  }, 500); // Simulating a small delay like an actual server request

  // Prevent form submission for this demo (use real submission logic in production)
  return false;
}

document.addEventListener("DOMContentLoaded", function() {
  // Create the "Back to Top" button
  const backToTopButton = document.createElement('button');
  backToTopButton.textContent = 'Back to Top';
  backToTopButton.style.position = 'fixed';
  backToTopButton.style.bottom = '20px';
  backToTopButton.style.right = '20px';
  backToTopButton.style.padding = '10px 20px';
  backToTopButton.style.fontSize = '16px';
  backToTopButton.style.backgroundColor = '#333';
  backToTopButton.style.color = '#fff';
  backToTopButton.style.border = 'none';
  backToTopButton.style.borderRadius = '5px';
  backToTopButton.style.cursor = 'pointer';
  backToTopButton.style.display = 'none'; // Initially hidden
  document.body.appendChild(backToTopButton);

  // Function to show or hide the button based on scroll position
  function toggleBackToTopButton() {
      if (window.scrollY > 300) {
          backToTopButton.style.display = 'block'; // Show button
      } else {
          backToTopButton.style.display = 'none'; // Hide button
      }
  }

  // Function to scroll smoothly to the top when the button is clicked
  function scrollToTop() {
      window.scrollTo({
          top: 0,
          behavior: 'smooth' // Smooth scroll effect
      });
  }

  // Add event listener for scroll event to show or hide the button
  window.addEventListener('scroll', toggleBackToTopButton);

  // Add event listener for the button to scroll to top when clicked
  backToTopButton.addEventListener('click', scrollToTop);

  // Initial check in case the page is loaded with scroll already at a position
  toggleBackToTopButton();
});