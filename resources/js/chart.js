$.ajax({
    url: 'http://localhost:8000/api/getStats',
    type: "GET",
    success: function (data) {
        console.log(data);
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Квадрат", "Круг", "Прямоугольник", "Треугольник"],
                datasets: [{
                    label: 'Процент суммарной площади фигур конкретного типа от общей площади',
                    data: [data['SQUARE'], data["CIRCLE"], data["RECTANGLE"], data["TRIANGLE"]],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    }
});
