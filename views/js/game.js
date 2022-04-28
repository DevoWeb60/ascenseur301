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

let piccolo;
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

var game = new Phaser.Game(config);

const baseURL = window.location.origin;

function preload() {
   this.load.image("sky", baseURL + "/views/assets/game/backgrounds.png");
   this.load.image("bomb", baseURL + "/views/assets/game/bomb.png");
   this.load.image("ground", baseURL + "/views/assets/game/platform-dbz.png");
   this.load.image(
      "big-ground",
      baseURL + "/views/assets/game/big-platform-dbz.png"
   );
   this.load.image("db4", baseURL + "/views/assets/game/db4.png");
   this.load.spritesheet("dude", baseURL + "/views/assets/game/piccolo.png", {
      frameWidth: 38,
      frameHeight: 48,
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

   piccolo = this.physics.add.sprite(100, 450, "dude");
   piccolo.setBounce(0.2);
   piccolo.setCollideWorldBounds(true);

   this.anims.create({
      key: "left",
      frames: [{ key: "dude", frame: 1 }],
      frameRate: 10,
   });
   this.anims.create({
      key: "turn",
      frames: [{ key: "dude", frame: 0 }],
      frameRate: 20,
   });
   this.anims.create({
      key: "right",
      frames: [{ key: "dude", frame: 2 }],
      frameRate: 10,
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
   this.physics.add.collider(piccolo, platforms);
   this.physics.add.collider(balls, platforms);
   this.physics.add.overlap(piccolo, balls, collectBalls, null, this);
   this.physics.add.collider(piccolo, bombs, hitBomb, null, this);

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
      piccolo.setVelocityX(-400);
      piccolo.anims.play("left");
   } else if (cursors.right.isDown) {
      piccolo.setVelocityX(400);
      piccolo.anims.play("right");
   } else {
      piccolo.setVelocityX(0);
      piccolo.anims.play("turn");
   }

   if (cursors.up.isDown && piccolo.body.touching.down) {
      piccolo.setVelocityY(-450);
      piccolo.anims.play("left", true);
   }
}

function collectBalls(piccolo, star) {
   star.disableBody(true, true);
   score += 10;
   scoreText.setText("Score: " + score);

   if (balls.countActive(true) === 0) {
      balls.children.iterate((child) => {
         child.enableBody(true, child.x, 0, true, true);
      });
      let x =
         piccolo.x < 400
            ? Phaser.Math.Between(400, 800)
            : Phaser.Math.Between(0, 400);

      let bomb = bombs.create(x, 16, "bomb");
      bomb.setBounce(1);
      bomb.setCollideWorldBounds(true);
      bomb.setVelocity(Phaser.Math.Between(-200, 200), 20);
   }
}

function hitBomb(piccolo, bomb) {
   health = health - 1;
   healthText.setText("Vie : " + health);
   if (health === 0) {
      this.physics.pause();
      piccolo.setTint(0xff0000);
      piccolo.anims.play("turn");
      gameOver = true;
   }
}
