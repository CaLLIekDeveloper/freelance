/*
//Есть три вида картинок : src="img/ferz.png",  src="img/inv.png, src="img/king.png"
При нажатии на картинку если это картинка ферзя или короля данные о этой картинке и координатах этой картинки
сохраняются в полях класса Avatar и запускается перенос картинки (картинка следует за курсором мыши) и 
при отпускании левой кнопки мышки ищет под собой обьект с "imgFigure" если во время отпускания левой кнопки мышки такого
обьекта под курсором нет то обьект возвращается обратно на свое место если есть запускается функция которая меняет src(картинку)
обьекта под курсором на src обьекта которого мы переносим после этого в координатах картинки на которую мы кликнули в начале
создается новый обьект с тегом img и классом "imgFigure" со значением src обьекта на который мы перенесли начальную картинку
*/

var DragManager = new function() {

  /**
   * составной объект для хранения информации о переносе:
   * {
   *   elem - элемент, на котором была зажата мышь
   *   avatar - аватар
   *   downX/downY - координаты, на которых был mousedown
   *   shiftX/shiftY - относительный сдвиг курсора от угла элемента
   * }
   */
  //Создаю элемент
  var dragObject = {};
  var self = this;

  //Функция при нажатии мыши 
  function onMouseDown(e) {
//Если нажатая кнопка не левая кнопка мыши выхожу из функции
    if (e.which != 1) return;
//Присваиваю переменной elem элемент ближайший родительский элемент (или сам элемент), 
//который соответствует заданному CSS-селектору ".imgFigure" 
    var elem = e.target.closest('.imgFigure');
    
    //Если элемент не найден выхожу из функции
    if (!elem) return;
    
    //Если нажатый элемент имеет невидимую картинку выйти из функции
    if(elem.src.indexOf("inv",0)!=-1){ return;}
    //Присваиваю полю elem обьекту dragObject найденный элемент 
    dragObject.elem = elem;
    //Удаляю полю elem обьекту dragObject класс "imgFigure"
    dragObject.elem.classList.remove('imgFigure');

   //запомнинаю, что элемент нажат на текущих координатах pageX/pageY
   //(Начальные координаты)
    dragObject.downX = e.pageX;
    dragObject.downY = e.pageY;

    return false;
  }

  function onMouseMove(e) {
    if (!dragObject.elem) return; // элемент не зажат

    if (!dragObject.avatar) { // если перенос не начат...
      var moveX = e.pageX - dragObject.downX;
      var moveY = e.pageY - dragObject.downY;

      // если мышь передвинулась в нажатом состоянии недостаточно далеко
      if (Math.abs(moveX) < 3 && Math.abs(moveY) < 3) {
        return;
      }

      // начинаю перенос
      dragObject.avatar = createAvatar(e); // создаю аватар
      if (!dragObject.avatar) { // отмена переноса, нельзя "захватить" за эту часть элемента
        dragObject = {};
        return;
      }

      // аватар создан успешно
      // создаю вспомогательные свойства shiftX/shiftY
      var coords = getCoords(dragObject.avatar);
      dragObject.shiftX = dragObject.downX - coords.left;
      dragObject.shiftY = dragObject.downY - coords.top;

      startDrag(e); // отобразить начало переноса
    }

    // отобразить перенос объекта при каждом движении мыши
    dragObject.avatar.style.left = e.pageX - dragObject.shiftX + 'px';
    dragObject.avatar.style.top = e.pageY - dragObject.shiftY + 'px';

    return false;
  }

  function onMouseUp(e) {
    if (dragObject.avatar) { // если перенос идет
      finishDrag(e);
    }

    // перенос либо не начинался, либо завершился
    // в любом случае очистим "состояние переноса" dragObject
    dragObject = {};
  }

  function finishDrag(e) {
    var dropElem = findDroppable(e);

    if (!dropElem) {
      self.onDragCancel(dragObject);
    } else {
      self.onDragEnd(dragObject, dropElem);
    }
  }

  function createAvatar(e) {

    // запоминаю старые свойства, чтобы вернуться к ним при отмене переноса
    var avatar = dragObject.elem;
    var old = {
      parent: avatar.parentNode,
      nextSibling: avatar.nextSibling,
      position: avatar.position || '',
      left: avatar.left || '',
      top: avatar.top || '',
      zIndex: avatar.zIndex || '',
      src: avatar.src || '',
      classList: 'imgFigure'
    };

    // функция для отмены переноса
    avatar.rollback = function() {
      old.parent.insertBefore(avatar, old.nextSibling);
      avatar.style.position = old.position;
      avatar.style.left = old.left;
      avatar.style.top = old.top;
      avatar.style.zIndex = old.zIndex;
      avatar.src = old.src;
      avatar.classList = 'imgFigure';
    };

    return avatar;
  }

  function startDrag(e) {
    var avatar = dragObject.avatar;

    // инициирую начало переноса
    document.body.appendChild(avatar);
    avatar.style.zIndex = 9999;
    avatar.style.position = 'absolute';
  }

  function findDroppable(event) {
    //запоминаю значения src для переносимого элемента
    var tempSrc =  dragObject.avatar.src;

    // получаю массив элементов под курсором мыши
    var elems = document.elementsFromPoint(event.clientX, event.clientY);
    var flag = 0;
    //в цикле проверяю все элементы массива под курсором
    for(var i=0; i<elems.length; i++)
    {
      //если один из элементов имеет класс "imgFigure"
      if(elems[i].classList.value=='imgFigure')
      {
        //тогда присваиваю элементу elem найденный элемент
        elem = elems[i];
        //и устанавливаю флаг = 1
        flag = 1;
        //выхожу из цикла если элемент найден
        break;
      }
    }
    //Проверяю если элемент найден то выполняю
    if(flag == 1)
    {

      //получаю массив элементов под начальными координатами обьекта который мы переносили 
      var elementsUnderCursor = document.elementsFromPoint(dragObject.downX, dragObject.downY);
      //в цикле проверяю все элементы массива
      for(var i=0; i<elementsUnderCursor.length; i++)
      {
        //Если элемент имеет тег "DIV"
        if(elementsUnderCursor[i].tagName=="DIV")
        {
            //то добавляю в него картинку элемента на который мы перенесли нашу начальную картинку
            elementsUnderCursor[i].innerHTML="<img class=\"imgFigure\" width=\"50\" height=\"50\" src="+elem.src+"></img>";
            //Устанавливаю элементу который мы перенесли src элемента(Картинку) на который мы переносим 
            elem.src = tempSrc;
            break;
        }
        
      }
    }
    //иначе если мы не находим нужный нам элемент с классом 'imgFigure'
    else
    {
      returnImgClassImgFigure();
      return null;
    }

    if (elem == null) {
      // такое возможно, если курсор мыши "вылетел" за границу окна
      return null;
    }
    if(flag==0)return dragObject.avatar;
    else
    return elem.closest('.imgFigure');
  }

  //Устанавливаю документу события 
  document.onmousemove = onMouseMove;
  document.onmouseup = onMouseUp;
  document.onmousedown = onMouseDown;

  this.onDragEnd = function(dragObject, dropElem) {};
  this.onDragCancel = function(dragObject) {returnImgClassImgFigure();};

};

function returnImgClassImgFigure()
{
      //Получаю массив элементов с тегом "img"
      var oldElemnts1 = document.getElementsByTagName('img');
      //добавляю всем єлементам с тегом "img" класс 'imgFigure'
      for(var i =0; i<oldElemnts1.length; i++)
      {
        oldElemnts1[i].classList='imgFigure';
      }
}

//Получаю координаты элемента
function getCoords(elem) {
  var box = elem.getBoundingClientRect();

  return {
    top: box.top + pageYOffset,
    left: box.left + pageXOffset
  };

}