window.addEventListener("DOMContentLoaded", () => {
  const search = document.querySelector("#search");
  const tableContainer = document.querySelector("#results tbody");
  const resultsContainer = document.querySelector("#resultsContainer");
  const errorsContainer = document.querySelector(".errors-container");
  let search_criteria = "";

  if (search) {
    search.addEventListener("input", (event) => {
      search_criteria = event.target.value.toUpperCase();
      showResults;
    });
  }

  const searchData = async () => {
    let searchData = new FormData();
    searchData.append("search_criteria", search_criteria);

    try {
      const response = await fetch("../productos/buscar.php", {
        method: "POST",
        body: searchData,
      });

      return response.json();
    } catch (error) {
      alert(
        `${"hubo un error y no podemos solicitar la solicitud en este momento. Razones: "}${
          error.message
        }`
      );
      console.log(error);
    }
  };

  const showResults = () => {
    searchData().then((dataResults) => {
      console.log(dataResults);
    });
  };
});
