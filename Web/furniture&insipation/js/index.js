var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

// https://dribbble.com/shots/2658222

var pathLength = 39;

var BtnGroup = function () {
  function BtnGroup(group) {
    var _this = this;

    _classCallCheck(this, BtnGroup);

    this.buttonSpacing = 20;
    this.group = group;
    this.buttons = Array.prototype.slice.call(this.group.querySelectorAll('.btn'));
    this.slides = Array.prototype.slice.call(document.querySelectorAll('.slide'));
    this.slideContainer = document.querySelector('.slides');
    this.slideContainer.style.width = this.slides.length + '00vw';
    this.svg = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
    this.svg.setAttribute('viewbox', '0 0 ' + this.buttonSpacing * this.buttons.length + ' 16');
    this.path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
    this.path.classList.add('line');
    this.currentPath = 'M ' + -this.buttonSpacing / 2 + ', 14';
    this.currentIndex = -1;
    this.activateIndex(this.buttons.indexOf(this.group.querySelector('.active')));
    this.group.appendChild(this.svg);
    this.svg.appendChild(this.path);
    this.refreshPath();
    this.initButtons();

    var _iteratorNormalCompletion = true;
    var _didIteratorError = false;
    var _iteratorError = undefined;

    try {
      for (var _iterator = this.buttons[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
        var button = _step.value;

        button.addEventListener('click', function (e) {
          return _this.onClick(e);
        });
      }
    } catch (err) {
      _didIteratorError = true;
      _iteratorError = err;
    } finally {
      try {
        if (!_iteratorNormalCompletion && _iterator.return) {
          _iterator.return();
        }
      } finally {
        if (_didIteratorError) {
          throw _iteratorError;
        }
      }
    }
  }

  _createClass(BtnGroup, [{
    key: 'initButtons',
    value: function initButtons() {
      for (var i = 0; i < this.buttons.length; i++) {
        var center = this.center(i);
        var path = document.createElementNS('http://www.w3.org/2000/svg', 'path');
        var pathStr = '';
        pathStr += 'M' + center + ', 14 ';
        pathStr += 'C' + (center + 3) + ', 14 ';
        pathStr += center + 6 + ', 11 ';
        pathStr += center + 6 + ',  8 ';
        pathStr += 'C' + (center + 6) + ',  5 ';
        pathStr += center + 3 + ',  2 ';
        pathStr += center + ',  2 ';
        pathStr += 'C' + (center - 3) + ',  2 ';
        pathStr += center - 6 + ',  5 ';
        pathStr += center - 6 + ',  8 ';
        pathStr += 'C' + (center - 6) + ', 11 ';
        pathStr += center - 3 + ', 14 ';
        pathStr += center + ', 14 ';
        path.setAttributeNS(null, 'd', pathStr);
        path.classList.add('circle');
      }
    }
  }, {
    key: 'onClick',
    value: function onClick(e) {
      var index = this.buttons.indexOf(e.srcElement || e.target);
      this.activateIndex(index);
    }
  }, {
    key: 'refreshPath',
    value: function refreshPath() {
      this.path.setAttributeNS(null, 'd', this.currentPath);
      this.path.style.strokeDashoffset = (-this.path.getTotalLength() + pathLength) * 0.9965;
    }
  }, {
    key: 'center',
    value: function center(index) {
      return index * this.buttonSpacing + this.buttonSpacing / 2;
    }
  }, {
    key: 'removeClass',
    value: function removeClass(str) {
      if (this.buttons[this.currentIndex]) {
        this.buttons[this.currentIndex].classList.remove(str);
      }
    }
  }, {
    key: 'addClass',
    value: function addClass(str) {
      if (this.buttons[this.currentIndex]) {
        this.buttons[this.currentIndex].classList.add(str);
      }
    }
  }, {
    key: 'activateIndex',
    value: function activateIndex(index) {
      this.slideContainer.style.left = -index + '00vw';
      var lastCenter = this.center(this.currentIndex);
      var nextCenter = this.center(index);
      var offset = 0;
      var sign = index < this.currentIndex ? -1 : 1;
      this.currentPath += 'C' + (lastCenter + sign * 3) + ', 14 ';
      this.currentPath += lastCenter + sign * 6 + ', 11 ';
      this.currentPath += lastCenter + sign * 6 + ',  8 ';
      this.currentPath += 'C' + (lastCenter + sign * 6) + ',  5 ';
      this.currentPath += lastCenter + sign * 3 + ',  2 ';
      this.currentPath += lastCenter + ',  2 ';
      this.currentPath += 'C' + (lastCenter - sign * 3) + ',  2 ';
      this.currentPath += lastCenter - sign * 6 + ',  5 ';
      this.currentPath += lastCenter - sign * 6 + ',  8 ';
      this.currentPath += 'C' + (lastCenter - sign * 6) + ', 11 ';
      this.currentPath += lastCenter - sign * 3 + ', 14 ';
      this.currentPath += lastCenter + ', 14 ';
      this.currentPath += 'L' + nextCenter + ', 14 ';
      this.currentPath += 'C' + (nextCenter + sign * 3) + ', 14 ';
      this.currentPath += nextCenter + sign * 6 + ', 11 ';
      this.currentPath += nextCenter + sign * 6 + ',  8 ';
      this.currentPath += 'C' + (nextCenter + sign * 6) + ',  5 ';
      this.currentPath += nextCenter + sign * 3 + ',  2 ';
      this.currentPath += nextCenter + ',  2 ';
      this.currentPath += 'C' + (nextCenter - sign * 3) + ',  2 ';
      this.currentPath += nextCenter - sign * 6 + ',  5 ';
      this.currentPath += nextCenter - sign * 6 + ',  8 ';
      this.currentPath += 'C' + (nextCenter - sign * 6) + ', 11 ';
      this.currentPath += nextCenter - sign * 3 + ', 14 ';
      this.currentPath += nextCenter + ', 14 ';
      this.removeClass('active');
      this.currentIndex = index;
      this.addClass('active');
      this.refreshPath();
    }
  }]);

  return BtnGroup;
}();

var groups = Array.prototype.slice.call(document.querySelectorAll('.btn-group'));

var _iteratorNormalCompletion2 = true;
var _didIteratorError2 = false;
var _iteratorError2 = undefined;

try {
  for (var _iterator2 = groups[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
    var group = _step2.value;

    console.log(new BtnGroup(group));
  }
} catch (err) {
  _didIteratorError2 = true;
  _iteratorError2 = err;
} finally {
  try {
    if (!_iteratorNormalCompletion2 && _iterator2.return) {
      _iterator2.return();
    }
  } finally {
    if (_didIteratorError2) {
      throw _iteratorError2;
    }
  }
}