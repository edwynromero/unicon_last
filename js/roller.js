var Roller = new Class({
	renderTo:undefined,
	height:undefined,
	duration:3,
	textContainer:undefined,
	imageContainer:undefined,
	images:[],
	preload:false,
	animation:undefined,
	currentIndex:undefined,
	viewport:{ },

	inAutoPlayMode:true,
	scramble:false,

	initialize:function (config) {
		this.renderTo = document.getElementById(config.renderTo);
		if (config.preload !== undefined)this.preload = config.preload;
		if (config.duration !== undefined)this.duration = config.duration;
		if (config.animation !== undefined)this.animation = config.animation;
		if (config.scramble !== undefined)this.scramble = config.scramble;
		this.createDOM();
		this.storeViewport();
	},

	createDOM:function () {
		this.el = new Element('div');
		this.el.className = 'ludo-roller';
		this.renderTo.appendChild(this.el);
		this.el.style.height = this.getRenderHeight() + 'px';
		this.el.style.width = this.getRenderWidth() + 'px';

		var t = this.textContainer = new Element('div');
		t.className = 'ludo-roller-text-container';
		this.el.appendChild(t);

		var i = this.imageContainer = new Element('div');
		i.className = 'ludo-roller-image-container';
		this.el.appendChild(i);
	},

	getRenderWidth:function(){

		return this.renderTo.offsetWidth
			- parseInt(this.el.getStyle('margin-left') || 0) - parseInt(this.el.getStyle('margin-right') || 0)
			- parseInt(this.el.getStyle('padding-left') || 0) - parseInt(this.el.getStyle('padding-right') || 0)
			- parseInt(this.el.getStyle('border-left-width') || 0) - parseInt(this.el.getStyle('border-right-width') || 0);
	},

	getRenderHeight:function(){
		return this.renderTo.offsetHeight - parseInt(this.el.getStyle('margin-top') || 0) - parseInt(this.el.getStyle('margin-bottom') || 0);
	},

	storeViewport:function () {
		var i = this.imageContainer;
		var t = this.textContainer;
		this.viewport = {
			img:{ width:parseInt(i.getStyle('width')), height:parseInt(i.getStyle('height'))},
			text:{ width:parseInt(t.getStyle('width')), height:parseInt(t.getStyle('height'))}
		}
	},

	add:function (image) {
		var img = new RollerImage({
			image:image,
			slideshow:this,
			listeners:{
				'createDOM':this.adoptElements.bind(this),
				'click':this.openURL.bind(this),
				'show':this.onShow.bind(this)
			}
		});
		this.images.push(img);
		if (this.images.length === 1) {
			img.preload();
		}
	},

	start:function () {
		if(this.scramble){
			this.images.sort(function(){ return Math.random() - Math.random()});
			this.images[0].preload();
			this.scramble = false;
		}
		this.showNext();
	},

	hideCurrent:function () {
		var current = this.getCurrent();
		if (current)current.hide();
	},

	showNext:function () {
		this.hideCurrent();
		var i = this.currentIndex;
		var img = this.next();
		if (i === undefined)img.justShow(); else img.show();

		var next = this.images[this.getIndexOfNext()];
		next.preload();
	},

	onShow:function (image) {
		if (this.inAutoPlayMode && image == this.getCurrent()) {
			this.showNext.delay(this.duration * 1000, this);
		}
	},

	next:function () {
		this.currentIndex = this.getIndexOfNext();
		return this.images[this.currentIndex];
	},

	getIndexOfNext:function () {
		var index = this.currentIndex === undefined ? 0 : this.currentIndex + 1;
		if (index >= this.images.length)index = 0;
		return index;
	},

	getCurrent:function () {
		return this.currentIndex !== undefined ? this.images[this.currentIndex] : undefined;
	},

	adoptElements:function (image) {
		this.imageContainer.appendChild(image.getImageEl());
		this.textContainer.appendChild(image.gettxt());
	},

	openURL:function (image) {
		window.open(image.getUrl());
	},

	getAnimation:function () {
		return this.animation;
	},

	getViewport:function () {
		return this.viewport;
	}
});

RollerImage = new Class({
	Extends:Events,
	image:undefined,
	slideshow:undefined,

	ani:{},

	initialize:function (config) {
		this.image = config.image;
		this.slideshow = config.slideshow;
		if (config.listeners !== undefined)this.addEvents(config.listeners);
	},

	createDOM:function () {

		var i = this.img = new Element('div');
		i.className = 'ludo-roller-image';
		i.style.backgroundImage = 'url(' + this.image.img + ')';
		i.style.display = 'none';
		i.addEvent('click', this.click.bind(this));

		var t = this.text = new Element('div');

		t.className = 'ludo-roller-text';
		t.innerHTML = this.image.text;
		t.style.display = 'none';
		t.addEvent('click', this.click.bind(this));

		this.fireEvent('createDOM', this);
	},

	click:function () {
		this.fireEvent('click', this);
	},

	getUrl:function () {
		return this.image.url;
	},

	getImageEl:function () {
		return this.img;
	},

	gettxt:function () {
		return this.text
	},

	preload:function () {
		if (this.img === undefined)this.createDOM();
	},

	show:function () {
		this.preload();
		this.showObject('text');
		this.showObject('img');
	},

	showObject:function (key) {
		switch (this.getAnimationEffect(key)) {
			case 'slide':
				this.slideObject(key);
				break;
			case 'fade':
				this.fadeIn(key);
				break;
			default:
				this.justShow();
		}
	},

	getAnimationEffect:function (objectType) {
		var effect = objectType === 'img' ? 'imageEffect' : 'textEffect';
		var animation = this.slideshow.getAnimation();
		return animation[effect];
	},

	fadeIn:function (key) {
		if (this.ani[key] === undefined)this.createAniObject(key);
		var animation = this.slideshow.getAnimation();
		this.ani[key].fadeIn(animation.duration);
	},

	fadeOut:function (key) {
		if (this.ani[key] === undefined)this.createAniObject(key);
		var animation = this.slideshow.getAnimation();
		this.ani[key].fadeOut(animation.duration);
	},

	slideObject:function (key) {
		var coords = this.getSlideFromAndTo(key);
		if (this.ani[key] === undefined)this.createAniObject(key);
		this.ani[key].slide(coords.from, coords.to, this.slideshow.getAnimation().duration, 'slideIn');

	},

	slideObjectOut:function (key) {
		var coords = this.getSlideFromAndTo(key);
		if (this.ani[key] === undefined)this.createAniObject(key);
		this.ani[key].slide(coords.to, { x:coords.from.x * -1, y:coords.from.y * -1}, this.slideshow.getAnimation().duration, 'slideOut');

	},

	getSlideFromAndTo:function (key) {
		var animation = this.slideshow.getAnimation();
		if (this.ani[key] === undefined)this.createAniObject(key);
		var effect = key === 'img' ? 'imageSlide' : 'textSlide';
		var from = this.getSlideFromCoordinates(key, animation[effect]);
		var to = { x:0, y:0};
		return {
			from:from, to:to
		}
	},

	getSlideFromCoordinates:function (objectType, key) {
		var viewport = this.slideshow.getViewport();
		var width = viewport[objectType].width;
		var height = viewport[objectType].height;
		switch (key) {
			case 'left':
				return { x:width, y:0 };
			case 'up':
				return { x:0, y:height };
				break;
			case 'right':
				return  { x:width * -1, y:0 };
				break;
			default:
				return  { x:0, y:height * -1};
		}
	},

	createAniObject:function (key) {
		var listeners = key == 'img' ? {
			'slideIn':this.onAnimationComplete.bind(this),
			'fadeIn':this.onAnimationComplete.bind(this)
		} : {};
		this.ani[key] = new RollerAnimation({
			el:this[key],
			listeners:listeners
		});
	},

	onAnimationComplete:function () {
		if (!this.isHidden())this.fireEvent('show', this);
	},

	justShow:function () {
		this.img.style.display = '';
		this.text.style.display = '';
		this.fireEvent('show', this);
	},

	isHidden:function () {
		return this.img.style.display === 'none';
	},

	hide:function () {
		this.hideObject('img');
		this.hideObject('text');
	},

	hideObject:function (objectType) {
		switch (this.getAnimationOutEffect(objectType)) {
			case 'slide':
				this.slideObjectOut(objectType);
				break;
			case 'fade':
				this.fadeOut(objectType);
				break;
			default:
				this[objectType].style.display = 'none';
		}
	},

	getAnimationOutEffect:function (objectType) {
		var effect = objectType === 'img' ? 'imageOutEffect' : 'textOutEffect';
		var animation = this.slideshow.getAnimation();
		return animation[effect] ? animation[effect] : this.getAnimationEffect(objectType);
	}
});

RollerZIndex = 200;

RollerAnimation = new Class({
	Extends:Events,
	el:undefined,
	fps:33,
	countStops:0,
	coord:{x:0, y:0, current:{ x:0, y:0} },
	currentStop:0,
	from:undefined,
	to:undefined,
	currentEffect:undefined,

	initialize:function (config) {
		this.el = config.el;
		this.el.style.position = 'absolute';
		this.addEvents(config.listeners);
	},

	fadeIn:function (duration) {
		this.fadeEffect(0, 100, duration, 'fadeIn');
	},

	fadeOut:function (duration) {
		this.fadeEffect(100, 0, duration, 'fadeOut');
	},

	fadeEffect:function (fromOpacity, toOpacity, duration, type) {
		this.currentEffect = type;
		this.increaseZIndex();
		this.setInitialStops(duration);
		this.el.style.opacity = fromOpacity / 100;
		this.el.style.filter = 'opacity(' + fromOpacity + ')';
		this.coord.value = (toOpacity - fromOpacity) / this.countStops;
		this.coord.currentValue = fromOpacity;
		this.el.style.display = '';
		this.executeFade();

	},

	increaseZIndex:function () {
		RollerZIndex++;
		this.el.style.zIndex = RollerZIndex;
	},

	executeFade:function () {
		this.coord.currentValue += this.coord.value;
		this.el.style.opacity = this.coord.currentValue / 100;
		this.el.style.filter = 'opacity(' + this.coord.currentValue + ')';
		this.currentStop++;
		if (this.currentStop < this.countStops) {
			this.executeFade.delay(this.fps, this);
		} else {
			if (this.coord.currentValue > 95) {
				this.el.style.opacity = 1;
				this.fireEvent(this.currentEffect, this);
			} else {
				this.el.style.display = 'none';
				this.el.style.opacity = 1;
				this.el.style.filter = 'opacity(100)';
			}
		}
	},


	setInitialStops:function (duration) {
		this.currentStop = 0;
		this.countStops = this.getCountStops(duration);
	},

	slide:function (from, to, duration, type) {
		this.currentEffect = type;
		this.increaseZIndex();
		this.from = from;
		this.to = to;
		duration = duration ? duration : 1;
		this.setInitialPosition(from);
		this.setInitialStops(duration);

		this.coord.x = (to.x - from.x) / this.countStops;
		this.coord.y = (to.y - from.y) / this.countStops;
		this.coord.current = this.from;
		this.executeSlide();
	},

	executeSlide:function () {
		this.coord.current.x += this.coord.x;
		this.coord.current.y += this.coord.y;
		this.el.style.left = Math.round(this.coord.current.x) + 'px';
		this.el.style.top = Math.round(this.coord.current.y) + 'px';
		this.currentStop++;
		if (this.currentStop < this.countStops) {
			this.executeSlide.delay(this.fps, this);
		} else {
			this.el.style.left = this.to.x + 'px';
			this.el.style.top = this.to.y + 'px';
			this.fireEvent(this.currentEffect, this);
		}
	},

	getCountStops:function (duration) {
		return this.fps * duration;
	},

	setInitialPosition:function (pos) {
		this.el.style.left = pos.x + 'px';
		this.el.style.top = pos.y + 'px';
		this.el.style.display = '';
	}
});
