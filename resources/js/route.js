var routes = require('./routes.json');

export default function () {
    var args = Array.prototype.slice.call(arguments);
    var name = args.shift();//извлекаем первый элемент
    if(routes[name] === undefined) {
        console.log('Не существует маршрута: ' + name);
    }
    else {
        return '/' + routes[name]
            .split('/')
            .map(str => str[0] == '{' ? args.shift() : str)
            .join('/')
    }
}
