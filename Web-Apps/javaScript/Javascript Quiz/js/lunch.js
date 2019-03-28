function submitAnswers() {
    var total = 18;
    var score = 0;

    // Get User Input
    var q1 = document.forms["quizForm"]["q1"].value;
    var q2 = document.forms["quizForm"]["q2"].value;
    var q3 = document.forms["quizForm"]["q3"].value;
    var q4 = document.forms["quizForm"]["q4"].value;
    var q5 = document.forms["quizForm"]["q5"].value;
    var q6 = document.forms["quizForm"]["q6"].value;
    var q7 = document.forms["quizForm"]["q7"].value;
    var q8 = document.forms["quizForm"]["q8"].value;
    var q9 = document.forms["quizForm"]["q9"].value;
    var q10 = document.forms["quizForm"]["q10"].value;
    var q11 = document.forms["quizForm"]["q11"].value;
    var q12 = document.forms["quizForm"]["q12"].value;
    var q13 = document.forms["quizForm"]["q13"].value;
    var q14 = document.forms["quizForm"]["q14"].value;
    var q15 = document.forms["quizForm"]["q15"].value;
    var q16 = document.forms["quizForm"]["q16"].value;
    var q17 = document.forms["quizForm"]["q17"].value;
    var q18 = document.forms["quizForm"]["q18"].value;

    // Validation
    for (i = 1; i <= total; i++) {
        if (eval('q' + i) == null || eval('q' + i) == '') {
            alert('You missed question ' + i);
            return false;
        }
    }

    // Set Correct Answers
    var answers = ["b", "a", "a", "a", "d", "a",
        "h", "b", "a", "c", "d", "a", "a", "c", "a", "b", "a", "a"
    ];

    var myArray = [];
    // Check Answers
    for (i = 1; i <= total; i++) {
        if (eval('q' + i) == answers[i - 1]) {
            score++;
        } else {
            myArray.push('q' + i + " ");
        }
    }

    // Display Results
    var results = document.getElementById('results');
    results.innerHTML = '<h3>You scored <span>' + score + '</span> out of <span>' + total + '</span> Correctly!<br>The Incorrect answers are as follows <span>' + myArray + '</span></h3>';
    alert('You scored ' + score + ' out of ' + total);

    return false;
}