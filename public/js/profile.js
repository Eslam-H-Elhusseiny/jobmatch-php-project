 // Select all the tabs
 const tabs = document.querySelectorAll('.nav-profile li');

 // Add click event listener to each tab
 tabs.forEach((tab, index) => {
   tab.addEventListener('click', () => {
     // Remove 'active' class from all tabs
     tabs.forEach(tab => tab.classList.remove('active'));

     // Add 'active' class to the clicked tab
     tab.classList.add('active');

     // Hide all the sections
     const sections = document.querySelectorAll('.tab');
     sections.forEach(section => section.style.display = 'none');

     // Show the corresponding section based on the clicked tab
     const targetSection = document.querySelector(`.tab:nth-child(${index + 1})`);
     targetSection.style.display = 'block';
   });
 });

 // Initialize the first tab as 'active'
 tabs[0].click();