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
    { name: "Code Interpreter", iconClass: "bi bi-terminal" }
  ],
  "tools-bi": [
    { name: "Tableau", iconClass: "bi bi-bar-chart-line" },
    { name: "Power BI", iconClass: "bi bi-graph-up" },
    { name: "Flourish", iconClass: "bi bi-palette2" },
    { name: "Gapminder", iconClass: "bi bi-pie-chart" },
    { name: "Google Sheets", iconClass: "bi bi-table" },
    { name: "Microsoft Excel", iconClass: "bi bi-file-earmark-spreadsheet" },
    { name: "PromptLoop", iconClass: "bi bi-arrow-repeat" },
    { name: "SheetAI", iconClass: "bi bi-cpu" }
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
    { name: "R", iconClass: "bi bi-r-square" },
    { name: "StatGPT", iconClass: "bi bi-brain" },
    { name: "Wolfram Alpha Pro", iconClass: "bi bi-lightbulb" }
  ],
  "tools-de": [
    { name: "PostgreSQL", iconClass: "bi bi-server" },
    { name: "MySQL", iconClass: "bi bi-database" },
    { name: "SQL GPT", iconClass: "bi bi-clipboard-data" },
    { name: "Hex", iconClass: "bi bi-diagram-2" },
    { name: "Deepnote AI", iconClass: "bi bi-stickies" },
    { name: "Apache Airflow", iconClass: "bi bi-wind" },
    { name: "Prefect", iconClass: "bi bi-check-circle" },
    { name: "Make.com", iconClass: "bi bi-diagram-2-fill" }
  ]
};

for (const sectionId in toolsData) {
  const container = document.getElementById(sectionId);
  if (!container) continue;

  toolsData[sectionId].forEach(tool => {
    const card = document.createElement("div");
    card.className = "tool-card-ija";
    card.innerHTML = `
      <i class="${tool.iconClass} tool-icon-ija"></i>
      <p>${tool.name}</p>
    `;
    container.appendChild(card);
  });
}




  function scrollTestimonials(direction) {
    const container = document.getElementById('testimonial-scroll');
    const scrollAmount = 350;
    container.scrollBy({
      left: direction === 'left' ? -scrollAmount : scrollAmount,
      behavior: 'smooth'
    });
  }


  // Get Form Values 
  document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("hero-form-ija");

  if (form) {
    form.addEventListener("submit", function (e) {
      e.preventDefault(); // Prevents page reload

      const formData = new FormData(form);
      const data = {};

      formData.forEach((value, key) => {
        data[key] = value;
      });

      console.log("Form Submitted:", data);
    });
  }
});

