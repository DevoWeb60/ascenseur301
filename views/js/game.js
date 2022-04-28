var config = {
    type: Phaser.AUTO,
    width: 800,
    parent: "game",
    height: 600,
    physics: {
        default: "arcade",
        arcade: {
            gravity: { y: 550 },
            debug: false,
        },
    },
    scene: {
        preload: preload,
        create: create,
        update: update,
    },
};

let vegito;
let platforms;
let cursors;
let balls;
let bombs;
let gameOver = false;
let score = 0;
let scoreText;
let healthText;
let health = 3;
let gameOverText;
let animationStarted = false;
let runLeft = false;
let runRight = false;

var game = new Phaser.Game(config);

let baseURL = window.location.origin;
if (baseURL === "http://localhost") {
    baseURL = "http://localhost/ascenseur301";
}

function preload() {
    this.load.image("sky", baseURL + "/views/assets/game/backgrounds.png");
    this.load.image("bomb", baseURL + "/views/assets/game/bomb.png");
    this.load.image("ground", baseURL + "/views/assets/game/platform-dbz.png");
    this.load.image(
        "big-ground",
        baseURL + "/views/assets/game/big-platform-dbz.png"
    );
    this.load.image("db4", baseURL + "/views/assets/game/db4.png");
    this.load.spritesheet("vegito", baseURL + "/views/assets/game/vegeto.png", {
        frameWidth: 51,
        frameHeight: 56,
    });
}

function create() {
    this.key = this.input.keyboard.addKeys({
        Enter: Phaser.Input.Keyboard.KeyCodes.ENTER,
    });
    this.add.image(400, 300, "sky");

    platforms = this.physics.add.staticGroup();

    platforms.create(400, 568, "big-ground");
    platforms.create(600, 400, "ground");
    platforms.create(50, 250, "ground");
    platforms.create(750, 220, "ground");

    vegito = this.physics.add.sprite(100, 450, "vegito");
    vegito.setBounce(0.2);
    vegito.setCollideWorldBounds(true);

    this.anims.create({
        key: "side",
        frames: this.anims.generateFrameNumbers("vegito", {
            start: 10,
            end: 12,
        }),
        frameRate: 8,
        repeat: 0,
    });
    this.anims.create({
        key: "turn",
        frames: [{ key: "vegito", frame: 0 }],
        frameRate: 20,
    });
    this.anims.create({
        key: "jump",
        frames: this.anims.generateFrameNumbers("vegito", { start: 2, end: 3 }),
        frameRate: 8,
        repeat: 0,
    });
    this.anims.create({
        key: "down",
        frames: [{ key: "vegito", frame: 6 }],
        frameRate: 20,
    });
    cursors = this.input.keyboard.createCursorKeys();

    balls = this.physics.add.group({
        key: "db4",
        repeat: 11,
        setXY: { x: 12, y: 0, stepX: 70 },
    });

    bombs = this.physics.add.group();

    balls.children.iterate((child) => {
        child.setBounceY(Phaser.Math.FloatBetween(0.4, 0.8));
    });

    this.physics.add.collider(bombs, platforms);
    this.physics.add.collider(vegito, platforms);
    this.physics.add.collider(balls, platforms);
    this.physics.add.overlap(vegito, balls, collectBalls, null, this);
    this.physics.add.collider(vegito, bombs, hitBomb, null, this);

    scoreText = this.add.text(16, 16, "Score: 0", {
        fontSize: "32px",
        fill: "#000",
        fontFamily: "arial",
    });
    healthText = this.add.text(700, 16, "Vie: 3", {
        fontSize: "32px",
        fill: "#000",
        fontFamily: "arial",
    });
}

function update() {
    if (gameOver) {
        gameOverText = this.add.text(170, 100, "Game Over\nENTRER : Rejouer", {
            fontSize: "50px",
            fill: "#333",
            align: "center",
            fontFamily: "arial",
            fontWeight: "bold",
        });
        if (this.key.Enter.isDown) {
            health = 3;
            score = 0;
            this.registry.destroy();
            this.events.off();
            this.scene.restart();
            gameOverText.destroy();
            gameOver = false;
        }
    }

    if (cursors.left.isDown) {
        vegito.setVelocityX(-400);
        vegito.flipX = false;
        if (!runLeft) {
            vegito.anims.play("side", true);
            runLeft = true;
        }
    } else if (cursors.right.isDown) {
        vegito.setVelocityX(400);
        vegito.flipX = true;
        if (!runRight) {
            vegito.anims.play("side", true);
            runRight = true;
        }
    } else {
        vegito.setVelocityX(0);
        vegito.anims.play("turn");
    }

    if (cursors.right.isUp) {
        runRight = false;
    }
    if (cursors.left.isUp) {
        runLeft = false;
    }

    if (cursors.up.isDown && vegito.body.touching.down) {
        vegito.setVelocityY(-450);
        vegito.anims.play("jump", true);
    }

    if (cursors.down.isDown && !vegito.body.touching.down) {
        vegito.setVelocityY(350);
        vegito.anims.play("down");
    }
}

function collectBalls(vegito, star) {
    star.disableBody(true, true);
    score += 10;
    scoreText.setText("Score: " + score);

    if (balls.countActive(true) === 0) {
        balls.children.iterate((child) => {
            child.enableBody(true, child.x, 0, true, true);
        });
        let x =
            vegito.x < 400
                ? Phaser.Math.Between(400, 800)
                : Phaser.Math.Between(0, 400);

        let bomb = bombs.create(x, 16, "bomb");
        bomb.setBounce(1);
        bomb.setCollideWorldBounds(true);
        bomb.setVelocity(Phaser.Math.Between(50, 100), 20);
    }
}

function hitBomb(vegito, bomb) {
    health = health - 1;
    healthText.setText("Vie : " + health);
    vegito.setTint(0xff0000);
    const hit = setTimeout(() => {
        vegito.clearTint();
    }, 200);
    if (health === 0) {
        clearTimeout(hit);
        this.physics.pause();
        vegito.setTint(0xff0000);
        vegito.anims.play("turn");
        gameOver = true;
    }
}
