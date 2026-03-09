[09/03/2026 01:08] ٱية حمدي ❤: function addCourse(){

var row = document.createElement('div');

row.className = 'course-row';

row.innerHTML =
'<label>Course:</label>' +
'<input type="text" name="course[]" placeholder="e.g. Mathematics" required>' +

'<label>Credits:</label>' +
'<input type="number" name="credits[]" placeholder="e.g. 3" min="1" required>' +

'<label>Grade:</label>' +

'<select name="grade[]">' +
'<option value="4.0">A</option>' +
'<option value="3.0">B</option>' +
'<option value="2.0">C</option>' +
'<option value="1.0">D</option>' +
'<option value="0.0">F</option>' +
'</select>' +

'<button type="button" onclick="this.parentNode.remove()">Remove</button>';

document.getElementById('courses').appendChild(row);

}


function validateForm(){

var courses = document.querySelectorAll('[name="course[]"]');
var credits = document.querySelectorAll('[name="credits[]"]');

for(var i=0;i<courses.length;i++){

if(courses[i].value === ""){

alert("All course name fields are required.");
return false;

}

}

for(var j=0;j<credits.length;j++){

if(isNaN(credits[j].value) || credits[j].value <= 0){

alert("Credit hours must be positive numbers.");
return false;

}

}

return true;

}
[09/03/2026 01:16] ٱية حمدي ❤: <?php

if (isset($_POST['course'], $_POST['credits'], $_POST['grade'])) {

$courses = $_POST['course'];
$credits = $_POST['credits'];
$grades = $_POST['grade'];

$totalPoints = 0;
$totalCredits = 0;

echo "<table>";

echo "<tr>
<th>Course</th>
<th>Credits</th>
<th>Grade</th>
<th>Grade Points</th>
</tr>";

for ($i = 0; $i < count($courses); $i++) {

$course = htmlspecialchars($courses[$i]);
$cr = floatval($credits[$i]);
$g = floatval($grades[$i]);

if ($cr <= 0) continue;

$pts = $cr * $g;

$totalPoints += $pts;
$totalCredits += $cr;

echo "<tr>
<td>$course</td>
<td>$cr</td>
<td>$g</td>
<td>$pts</td>
</tr>";

}

echo "</table>";

if ($totalCredits > 0) {

$gpa = $totalPoints / $totalCredits;

if ($gpa >= 3.7) {
$interpretation = "Distinction";
}
elseif ($gpa >= 3.0) {
$interpretation = "Merit";
}
elseif ($gpa >= 2.0) {
$interpretation = "Pass";
}
else {
$interpretation = "Fail";
}

echo "<p>Your GPA is <strong>" . number_format($gpa,2) . "</strong> ($interpretation).</p>";

}

}

else {

echo "Data not received.";

}

?>
