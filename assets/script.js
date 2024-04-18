var fn = [
    'nom',
    'nombre',
    'courriel',
    'texte'
]

var tn = [
    'name',
    'number',
    'email',
    'text'
]

for(var i = 0; i < fn.length; i++){
    var input = document.getElementById(fn[i])
    input.name = tn[i]
}