const toolsData = {
  "tools-ai": [
    { name: "ChatGPT", iconClass: "bi bi-robot" },
    { name: "GitHub Copilot", iconClass: "bi bi-github" },
    { name: "LangChain", iconClass: "bi bi-diagram-3" },
    { name: "OpenAI API", iconClass: "bi bi-braces" },
    { name: "Hugging Face", iconClass: "bi bi-emoji-smile" },
    { name: "Zapier AI", iconClass: "bi bi-lightning-charge" },
    { name: "Pinecone", iconClass: "bi bi-diagram-3-fill" },
    { name: "Weaviate", iconClass: "bi bi-grid-1x2" },
    // { name: "ChatGPTCode Interpreter", iconClass: "bi bi-terminal" }
  ],
  "tools-bi": [
    { name: "Tableau with Copilot", iconClass: "bi bi-bar-chart-line" },
    { name: "Power BI with Copilot", iconClass: "bi bi-graph-up" },
    { name: "Flourish", iconClass: "bi bi-palette2" },
    { name: "Gapminder", iconClass: "bi bi-pie-chart" },
    { name: "Google Sheets", iconClass: "bi bi-table" },
    { name: "Microsoft Excel", iconClass: "bi bi-file-earmark-spreadsheet" },
    { name: "PromptLoop", iconClass: "bi bi-arrow-repeat" },
    { name: "SheetAI", iconClass: "bi bi-cpu" },
  ],
  "tools-dev": [
    { name: "Python", iconClass: "bi bi-code-slash" },
    { name: "JupyterLab", iconClass: "bi bi-journal-code" },
    { name: "VS Code", iconClass: "bi bi-code-square" },
    { name: "Matplotlib", iconClass: "bi bi-graph-up-arrow" },
    { name: "Seaborn", iconClass: "bi bi-droplet-half" },
    { name: "Plotly", iconClass: "bi bi-bezier" },
    { name: "statsmodels", iconClass: "bi bi-sliders" },
    { name: "scipy", iconClass: "bi bi-slash-square" },
    // { name: "R", iconClass: "bi bi-r-square" },
    // { name: "StatGPT", iconClass: "bi bi-brain" },
    // { name: "Wolfram Alpha Pro", iconClass: "bi bi-lightbulb" }
  ],
  "tools-de": [
    { name: "PostgreSQL", iconClass: "bi bi-server" },
    { name: "MySQL", iconClass: "bi bi-database" },
    { name: "SQL GPT", iconClass: "bi bi-clipboard-data" },
    { name: "Hex", iconClass: "bi bi-diagram-2" },
    { name: "Deepnote AI", iconClass: "bi bi-stickies" },
    { name: "Apache Airflow", iconClass: "bi bi-wind" },
    { name: "Prefect", iconClass: "bi bi-check-circle" },
    { name: "Make.com", iconClass: "bi bi-diagram-2-fill" },
  ],
};

const testimonials = [
  {
    heading: "“From confused to confident in 10 weeks.”",
    message:
      "I had zero technical background. Today, I build dashboards, write SQL queries, and even use GenAI to automate insights. This program gave me momentum I was missing for years.",
    name: "— Divya S., MBA Graduate",
    image: "femaleT.png",
  },
  {
    heading: "“It's not just a course. It's a career reset.”",
    message:
      "I was stuck in a support role for 5 years. This program gave me clarity, structure, and skills to finally make the shift. Landed my first analytics job within 2 months of completion.",
    name: "— Prashant R., Career Switcher",
    image: "maleT.png",
  },
  {
    heading: "“The GenAI part blew my mind.”",
    message:
      "I never imagined using AI tools to build reports or automate workflows. This isn’t theoretical — you actually build things that matter.",
    name: "— Ankita T., MIS Executive",
    image: "femaleT.png",
  },
  {
    heading: "“The weekend structure worked perfectly.”",
    message:
      "As a working professional, I couldn't afford to quit. The live + self-paced format was intense but manageable. The mentors were outstanding.",
    name: "— Karan J., Marketing Analyst",
    image: "maleT.png",
  },
  {
    heading: "“Way better than YouTube or recorded courses.”",
    message:
      "I had tried self-learning for months and kept quitting. This program's structure, doubt support, and live guidance made all the difference.",
    name: "— Rhea N., Graduate",
    image: "femaleT.png",
  },
  {
    heading: "“It made me believe in myself again.”",
    message:
      "I used to feel intimidated by tech. Today, I present data stories to clients. This course didn't just teach me — it transformed me.",
    name: "— Mohammed A., Small Business Owner",
    image: "maleT.png",
  },
];

for (const sectionId in toolsData) {
  const container = document.getElementById(sectionId);
  if (!container) continue;

  toolsData[sectionId].forEach((tool) => {
    const card = document.createElement("div");
    card.className = "tool-card-ija";
    card.innerHTML = `
      <i class="${tool.iconClass} tool-icon-ija"></i>
      <p>${tool.name}</p>
    `;
    container.appendChild(card);
  });
}

// testimonials 
function scrollTestimonials(direction) {
  const container = document.getElementById("testimonial-scroll");
  const scrollAmount = 350;
  container.scrollBy({
    left: direction === "left" ? -scrollAmount : scrollAmount,
    behavior: "smooth",
  });
}

// Get Form Values
document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("hero-form-ija");
  const submitBtn = form.querySelector("button[type='submit']");
  // On form submit: disable button and store flag
  form.addEventListener("submit", function () {
    submitBtn.disabled = true;
    submitBtn.innerText = "Submitting...";
    sessionStorage.setItem("formSubmitted", "true");
  });
  // On page load after submission: show thank you, hide form
  if (sessionStorage.getItem("formSubmitted") === "true") {
    document.getElementById("form-wrapper").style.display = "none";
    document.getElementById("thank-you-message").style.display = "block";
    sessionStorage.removeItem("formSubmitted");
    document.getElementById("headerButton").disabled = false;
  }

  // Go to top button 
  document.getElementById("scrollToTopBtn").addEventListener("click", function () {
    window.scrollTo({
      top: 0,
      behavior: "smooth"
    });
  });

  // REcruiters
  const marqueeTrack = document.getElementById("marqueeTrack");

  function addImages() {
    for (let i = 1; i <= 25; i++) {
      const img = document.createElement("img");
      img.src = `images/recruiters/${i}.png`;
      img.alt = `Recruiter ${i}`;
      marqueeTrack.appendChild(img);
    }
  }
  addImages();
  addImages();

  // Pie Chart
  const ctx = document.getElementById("audiencePieChart").getContext("2d");
  new Chart(ctx, {
    type: "pie",
    data: {
      labels: [
        "Marketing & Sales Professionals",
        "Non-tech Working Professionals",
        "Fresh Graduates (Engineering/MBA)",
        "Small Business Owners / Entrepreneurs",
        "Operations / HR / Admin",
        "Finance & Accounting Professionals",
        "IT & Software Engineers",
        "Others",
      ],
      datasets: [
        {
          data: [25, 20, 18, 15, 8, 5, 4, 5],
          backgroundColor: [
            "#FF8000",
            "#122E5D",
            "#f7b733",
            "#4CAF50",
            "#e91e63",
            "#9c27b0",
            "#00bcd4",
            "#ccc",
          ],
          borderWidth: 2,
          borderColor: "#fff",
        },
      ],
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          position: "bottom",
          labels: {
            color: "#333",
            font: {
              size: 14,
              weight: "500",
            },
          },
        },
        tooltip: {
          callbacks: {
            label: function (context) {
              return `${context.label}: ${context.parsed}%`;
            },
          },
        },
      },
    },
  });

  // Testimonials Object


  const carouselInner = document.getElementById("testimonial-carousel-inner");
  for (let i = 0; i < testimonials.length; i += 3) {
    const group = testimonials.slice(i, i + 3);
    const isActive = i === 0 ? "active" : "";
    const itemsHTML = group
      .map(
        (item) => `
      <div class="col-md-4 mb-4">
        <div class="testimonial-card p-4 bg-white shadow text-center h-100">
          <img src="images/${item.image}" alt="${item.name}" class="rounded-circle mb-3" width="70" height="70" style="object-fit: cover;">
          <h6 class="fw-bold mb-2">${item.heading}</h6>
          <p class="small fst-italic text-muted">"${item.message}"</p>
          <strong class="d-block mt-3 text-dark">${item.name}</strong>
        </div>
      </div>
    `
      )
      .join("");

    const slideHTML = `
      <div class="carousel-item ${isActive}">
        <div class="row justify-content-center">
          ${itemsHTML}
        </div>
      </div>
    `;
    carouselInner.insertAdjacentHTML("beforeend", slideHTML);
  }

  // UTM 
  function getUTMParam(param) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(param) || '';
  }

  document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("utm_source").value = getUTMParam("utm_source");
    document.getElementById("utm_medium").value = getUTMParam("utm_medium");
    document.getElementById("utm_campaign").value = getUTMParam("utm_campaign");
    document.getElementById("utm_content").value = getUTMParam("utm_content");
  });
});

// Returning Home From Error Page
document.querySelector(".backToHome").addEventListener("click", function (e) {
  e.preventDefault();
  sessionStorage.setItem("formSubmitted", "false");
  window.location.href = "index.html";
});



