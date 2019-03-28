function submitAnswers() {
    var score = 0;
    var questions = [
        ['The Clubhouse Wrap comes with Swiss, Cheddar, Mayonnaise, Tomato and Greens in a Spinach wrap with what deli meats inside?', 'HAM'],
        ['Question Two?', '2 Answer'],
        ['Question Three?', '3 Answer'],
        ['Question Four?', '4 Answer'],
        ['Question Five?', '5 Answer'],
        ['Question Six?', '6 Answer']
    ];

    var cA = [];
    var incorrect = [];

    function askQuestion(question, index) {
        var answer = prompt(question[0], '');
        if (answer == question[1]) {
            alert('Correct!');
            score++;
            cA = question;
        } else {
            incorrect.push(index);
            alert('Sorry. The correct answer is ' + question[1]);
        }
    }
    for (var i = 0; i < questions.length; i++) {
        askQuestion(questions[i], i);
    }

    var message = 'You got ' + score;
    message += ' out of ' + questions.length;
    message += ' questions correct.<br>' + cA;

    message += '<br><br>You answered ' + incorrect.length;
    message += ' questions incorrect. These are as follows:';

    for (var i in incorrect) {
        message += '<p>Q ' + (incorrect[i] + 1) + '. ' + questions[incorrect[i]][0] + '<br>' + questions[incorrect[i]][1] + ' </p>';
    }
    var results = document.getElementById('results');
    results.innerHTML = '<p>' + message + '</p>';

    return false;
}