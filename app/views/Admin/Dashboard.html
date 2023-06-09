<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doanh thu</title>
    <script src='https://d3js.org/d3.v4.min.js'></script>
</head>
<body>
    <script>

        const data = [2000, 3000, 6000, 8000, 4000, 6000, 12000, 5000, 3500,6000,4000];
const total = data.reduce((a, b) => a + b, 0);
const rate = data.map((d) => (d / total) * 100);
const width = 1000;
const height = 600;
const delay = 50; // mili giây

const svg = d3.select("body")
  .append("svg")
  .attr("width", width)
  .attr("height", height);
function addColumn(index) {
  svg.append("rect")
    .attr("x", index * 70)
    .attr("y", height)
    .attr("width", 50)
    .attr("height", 0)
    .attr("fill", "green")
    .transition()
    .delay(index * delay)
    .attr("y", (d) => height - rate[index] * 20)
    .attr("height", (d) => rate[index] * 20);
  svg.append("text")
    .text(Math.round(rate[index] * total / 100) + " VND")
    .attr("x", index * 70)
    .attr("y", height)
    .attr("fill", "red")
    .transition()
    .delay(index * delay)
    .attr("y", (d) => height - rate[index] * 20 - 10);
}
for (let i = 0; i < data.length; i++) {
  addColumn(i);
}

    </script>
</body>
</html>
1