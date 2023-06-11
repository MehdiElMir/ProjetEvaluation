</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="../js/chart.js"></script>
    <script>
        var number = 0;


        document.getElementById("show-questions-btn").addEventListener("click", function() {
            var selectedModule = document.getElementById("module-select").value;
            var surveyId = <?php echo $_GET["id"]; ?>;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var questions = JSON.parse(xhr.responseText);
                        displayQuestions(questions);
                    } else {
                        console.error("Une erreur s'est produite lors de la récupération des questions.");
                    }
                }
            };
            xhr.open("GET", "get_questions.php?module=" + encodeURIComponent(selectedModule) + "&surveyId=" +
                encodeURIComponent(surveyId), true);
            xhr.send();
        });

        const displayQuestions = async (questions) => {
            questions.forEach(async (question, index) => {
                var formContainer = document.getElementById("form");
                let flag = 1;
                let globalContainer = document.getElementById(`question-${index}`) || null;
                if (globalContainer != null) {
                    globalContainer = document.getElementById(`question-${index}`);
                    globalContainer.innerHTML = "";
                    flag = 0;
                } else {
                    globalContainer = document.createElement(`div`);
                    globalContainer.id = `question-${index}`;
                    form.appendChild(globalContainer);
                    flag = 1;
                }
                var questionElement = document.createElement("h6");
                questionElement.textContent = question.question_phrase + "?";
                globalContainer.appendChild(questionElement);

                var selectedModule = document.getElementById("module-select").value;
                var surveyId = <?php echo $_GET["id"]; ?>;
                var id_q = question.id_question;
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            var comments = JSON.parse(xhr.responseText);
                            displayComments(comments, index, globalContainer, formContainer, flag);
                        } else {
                            console.error("Une erreur s'est produite lors de la récupération des questions.");
                        }
                    }
                };
                xhr.open("GET", "get_comment.php?module=" + encodeURIComponent(selectedModule) + "&surveyId=" +
                    encodeURIComponent(surveyId) + "&id_q=" + encodeURIComponent(id_q), true);
                xhr.send();

                let chartContainer = document.createElement("div");
                chartContainer.className = "chart-statistique mb-5 mt-2 ml-4";
                globalContainer.appendChild(chartContainer);

                let canvas = document.createElement("canvas");
                canvas.id = `myChart-${index}`;
                chartContainer.appendChild(canvas);

                const { count, chartData } = await fetchChartData(selectedModule, surveyId, id_q);
                // console.log(`${index} ==> ${chartData} `)
                number = count;

                let responseCount = document.createElement("p");
                responseCount.className = "text-center mt-2";
                responseCount.textContent = `Nombres d'étudiants répondus: ${number}`;
                chartContainer.appendChild(responseCount);

                // Create chart
                let ctx = document.getElementById(`myChart-${index}`);
                if (ctx) {
                    new Chart(ctx, {
                        type: "pie",
                        data: {
                            labels: ["pas du tout d'accord", "pas d'accord", "Moyennement d'accord", "d'accord", "entièrement d'accord"],
                            datasets: [{
                                label: "Réponses",
                                data: chartData,
                                backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56","#EA906C", "#9EB23B"],
                                borderWidth: 1
                            }]
                        }
                    });
                }
            });
        }

        function displayComments(comments, index, container, form, flag) {
            comments.forEach(function(comment) {
                let comments = document.createElement("p");
                comments.textContent = comment.comment ;
                container.appendChild(comments);
            });
        }

        function fetchChartData(selectedModule, surveyId, id_q) {
            const statPromise = fetch("getStat.php?module=" + encodeURIComponent(selectedModule) + "&surveyId=" +encodeURIComponent(surveyId) + "&id_q=" + encodeURIComponent(id_q)).then((res) => res.json());

            const responsePromise = fetch("getResponse.php?module=" + encodeURIComponent(selectedModule) + "&surveyId=" +encodeURIComponent(surveyId) + "&id_q=" + encodeURIComponent(id_q)).then((res) => res.json());

            return Promise.all([statPromise, responsePromise]).then(([statData, responseData]) => {
                let chartMap = new Map(
                    [['1', 0],
                    ['2', 0],
                    ['3', 0],
                    ['4', 0],
                    ['5', 0]]
                )
                const count = responseData[0].count; // Assuming there is only one response count

                console.log(responseData)
                console.log("STAT DATA ==> ", statData)

                statData.map((item) => chartMap.set(item.id_reponse_note, parseInt(item.count)));

                let chartData = Array.from(chartMap.values()) 

                // console.log(chartData)

                return { count, chartData };
            });
        }

    </script>
</body>
</html>