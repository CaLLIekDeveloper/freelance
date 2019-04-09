namespace CryptTester
{
    partial class Form1
    {
        /// <summary>
        /// Обязательная переменная конструктора.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Освободить все используемые ресурсы.
        /// </summary>
        /// <param name="disposing">истинно, если управляемый ресурс должен быть удален; иначе ложно.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Код, автоматически созданный конструктором форм Windows

        /// <summary>
        /// Требуемый метод для поддержки конструктора — не изменяйте 
        /// содержимое этого метода с помощью редактора кода.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Form1));
            this.openFile = new System.Windows.Forms.OpenFileDialog();
            this.b1 = new System.Windows.Forms.Button();
            this.b2 = new System.Windows.Forms.Button();
            this.menuStrip1 = new System.Windows.Forms.MenuStrip();
            this.файлToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.вихідToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.проПрограммуToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.рToolStripMenuItem = new System.Windows.Forms.ToolStripMenuItem();
            this.label1 = new System.Windows.Forms.Label();
            this.file = new System.Windows.Forms.TextBox();
            this.bSelectFile = new System.Windows.Forms.Button();
            this.panel1 = new System.Windows.Forms.Panel();
            this.t2 = new System.Windows.Forms.Label();
            this.t1 = new System.Windows.Forms.Label();
            this.label5 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.tKey = new System.Windows.Forms.TextBox();
            this.tab = new System.Windows.Forms.TabControl();
            this.tabPage1 = new System.Windows.Forms.TabPage();
            this.ran = new System.Windows.Forms.CheckBox();
            this.label12 = new System.Windows.Forms.Label();
            this.tPass = new System.Windows.Forms.TextBox();
            this.winEncrypt = new System.Windows.Forms.Label();
            this.tabPage2 = new System.Windows.Forms.TabPage();
            this.r4 = new System.Windows.Forms.TextBox();
            this.button2 = new System.Windows.Forms.Button();
            this.r3 = new System.Windows.Forms.TextBox();
            this.button4 = new System.Windows.Forms.Button();
            this.r2 = new System.Windows.Forms.TextBox();
            this.button3 = new System.Windows.Forms.Button();
            this.r1 = new System.Windows.Forms.TextBox();
            this.button1 = new System.Windows.Forms.Button();
            this.winDecrypt = new System.Windows.Forms.Label();
            this.panel2 = new System.Windows.Forms.Panel();
            this.l2 = new System.Windows.Forms.Label();
            this.l1 = new System.Windows.Forms.Label();
            this.label8 = new System.Windows.Forms.Label();
            this.label9 = new System.Windows.Forms.Label();
            this.label10 = new System.Windows.Forms.Label();
            this.label11 = new System.Windows.Forms.Label();
            this.openKey = new System.Windows.Forms.OpenFileDialog();
            this.openCryptRC6 = new System.Windows.Forms.OpenFileDialog();
            this.openKeyRC6 = new System.Windows.Forms.OpenFileDialog();
            this.openCryptAES = new System.Windows.Forms.OpenFileDialog();
            this.openPassAES = new System.Windows.Forms.OpenFileDialog();
            this.menuStrip1.SuspendLayout();
            this.panel1.SuspendLayout();
            this.tab.SuspendLayout();
            this.tabPage1.SuspendLayout();
            this.tabPage2.SuspendLayout();
            this.panel2.SuspendLayout();
            this.SuspendLayout();
            // 
            // b1
            // 
            this.b1.Enabled = false;
            this.b1.Location = new System.Drawing.Point(501, 139);
            this.b1.Name = "b1";
            this.b1.Size = new System.Drawing.Size(103, 38);
            this.b1.TabIndex = 0;
            this.b1.Text = "Зашифрувати";
            this.b1.UseVisualStyleBackColor = true;
            this.b1.Click += new System.EventHandler(this.button1_Click);
            // 
            // b2
            // 
            this.b2.Enabled = false;
            this.b2.Location = new System.Drawing.Point(501, 161);
            this.b2.Name = "b2";
            this.b2.Size = new System.Drawing.Size(103, 38);
            this.b2.TabIndex = 1;
            this.b2.Text = "Розшифрувати";
            this.b2.UseVisualStyleBackColor = true;
            this.b2.Click += new System.EventHandler(this.button2_Click);
            // 
            // menuStrip1
            // 
            this.menuStrip1.Items.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.файлToolStripMenuItem,
            this.проПрограммуToolStripMenuItem,
            this.рToolStripMenuItem});
            this.menuStrip1.Location = new System.Drawing.Point(0, 0);
            this.menuStrip1.Name = "menuStrip1";
            this.menuStrip1.Size = new System.Drawing.Size(620, 24);
            this.menuStrip1.TabIndex = 2;
            this.menuStrip1.Text = "menuStrip1";
            // 
            // файлToolStripMenuItem
            // 
            this.файлToolStripMenuItem.DropDownItems.AddRange(new System.Windows.Forms.ToolStripItem[] {
            this.вихідToolStripMenuItem});
            this.файлToolStripMenuItem.Name = "файлToolStripMenuItem";
            this.файлToolStripMenuItem.Size = new System.Drawing.Size(48, 20);
            this.файлToolStripMenuItem.Text = "Файл";
            // 
            // вихідToolStripMenuItem
            // 
            this.вихідToolStripMenuItem.Name = "вихідToolStripMenuItem";
            this.вихідToolStripMenuItem.Size = new System.Drawing.Size(102, 22);
            this.вихідToolStripMenuItem.Text = "Вихід";
            this.вихідToolStripMenuItem.Click += new System.EventHandler(this.вихідToolStripMenuItem_Click);
            // 
            // проПрограммуToolStripMenuItem
            // 
            this.проПрограммуToolStripMenuItem.Name = "проПрограммуToolStripMenuItem";
            this.проПрограммуToolStripMenuItem.Size = new System.Drawing.Size(96, 20);
            this.проПрограммуToolStripMenuItem.Text = "Зашифрувати";
            this.проПрограммуToolStripMenuItem.Click += new System.EventHandler(this.проПрограммуToolStripMenuItem_Click);
            // 
            // рToolStripMenuItem
            // 
            this.рToolStripMenuItem.Name = "рToolStripMenuItem";
            this.рToolStripMenuItem.Size = new System.Drawing.Size(102, 20);
            this.рToolStripMenuItem.Text = "Розшифрувати";
            this.рToolStripMenuItem.Click += new System.EventHandler(this.рToolStripMenuItem_Click);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(3, 15);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(118, 13);
            this.label1.TabIndex = 4;
            this.label1.Text = "Введіть ключ для RC6";
            // 
            // file
            // 
            this.file.Enabled = false;
            this.file.Location = new System.Drawing.Point(138, 104);
            this.file.Name = "file";
            this.file.Size = new System.Drawing.Size(466, 20);
            this.file.TabIndex = 5;
            // 
            // bSelectFile
            // 
            this.bSelectFile.Location = new System.Drawing.Point(6, 102);
            this.bSelectFile.Name = "bSelectFile";
            this.bSelectFile.Size = new System.Drawing.Size(114, 23);
            this.bSelectFile.TabIndex = 7;
            this.bSelectFile.Text = "Оберіть файл";
            this.bSelectFile.UseVisualStyleBackColor = true;
            this.bSelectFile.Click += new System.EventHandler(this.bSelectFile_Click);
            // 
            // panel1
            // 
            this.panel1.Controls.Add(this.t2);
            this.panel1.Controls.Add(this.t1);
            this.panel1.Controls.Add(this.label5);
            this.panel1.Controls.Add(this.label4);
            this.panel1.Controls.Add(this.label3);
            this.panel1.Controls.Add(this.label2);
            this.panel1.Location = new System.Drawing.Point(6, 190);
            this.panel1.Name = "panel1";
            this.panel1.Size = new System.Drawing.Size(600, 91);
            this.panel1.TabIndex = 9;
            // 
            // t2
            // 
            this.t2.AutoSize = true;
            this.t2.Location = new System.Drawing.Point(470, 40);
            this.t2.Name = "t2";
            this.t2.Size = new System.Drawing.Size(10, 13);
            this.t2.TabIndex = 5;
            this.t2.Text = "-";
            // 
            // t1
            // 
            this.t1.AutoSize = true;
            this.t1.Location = new System.Drawing.Point(104, 40);
            this.t1.Name = "t1";
            this.t1.Size = new System.Drawing.Size(10, 13);
            this.t1.TabIndex = 4;
            this.t1.Text = "-";
            // 
            // label5
            // 
            this.label5.AutoSize = true;
            this.label5.Location = new System.Drawing.Point(370, 40);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(93, 13);
            this.label5.TabIndex = 3;
            this.label5.Text = "Час шифрування";
            // 
            // label4
            // 
            this.label4.AutoSize = true;
            this.label4.Location = new System.Drawing.Point(4, 40);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(93, 13);
            this.label4.TabIndex = 2;
            this.label4.Text = "Час шифрування";
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.label3.Location = new System.Drawing.Point(425, 12);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(38, 16);
            this.label3.TabIndex = 1;
            this.label3.Text = "AES";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.label2.Location = new System.Drawing.Point(52, 12);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(37, 16);
            this.label2.TabIndex = 0;
            this.label2.Text = "RC6";
            // 
            // tKey
            // 
            this.tKey.Location = new System.Drawing.Point(138, 12);
            this.tKey.Name = "tKey";
            this.tKey.Size = new System.Drawing.Size(466, 20);
            this.tKey.TabIndex = 10;
            this.tKey.TextChanged += new System.EventHandler(this.tKey_TextChanged_1);
            this.tKey.KeyPress += new System.Windows.Forms.KeyPressEventHandler(this.tKey_KeyPress);
            this.tKey.MouseEnter += new System.EventHandler(this.tKey_MouseEnter);
            // 
            // tab
            // 
            this.tab.Controls.Add(this.tabPage1);
            this.tab.Controls.Add(this.tabPage2);
            this.tab.Dock = System.Windows.Forms.DockStyle.Fill;
            this.tab.Location = new System.Drawing.Point(0, 24);
            this.tab.Name = "tab";
            this.tab.SelectedIndex = 0;
            this.tab.Size = new System.Drawing.Size(620, 368);
            this.tab.TabIndex = 11;
            // 
            // tabPage1
            // 
            this.tabPage1.Controls.Add(this.ran);
            this.tabPage1.Controls.Add(this.label12);
            this.tabPage1.Controls.Add(this.tPass);
            this.tabPage1.Controls.Add(this.winEncrypt);
            this.tabPage1.Controls.Add(this.label1);
            this.tabPage1.Controls.Add(this.tKey);
            this.tabPage1.Controls.Add(this.b1);
            this.tabPage1.Controls.Add(this.panel1);
            this.tabPage1.Controls.Add(this.file);
            this.tabPage1.Controls.Add(this.bSelectFile);
            this.tabPage1.Location = new System.Drawing.Point(4, 22);
            this.tabPage1.Name = "tabPage1";
            this.tabPage1.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage1.Size = new System.Drawing.Size(612, 342);
            this.tabPage1.TabIndex = 0;
            this.tabPage1.Text = "Зашифрувати";
            this.tabPage1.UseVisualStyleBackColor = true;
            // 
            // ran
            // 
            this.ran.AutoSize = true;
            this.ran.Location = new System.Drawing.Point(138, 76);
            this.ran.Name = "ran";
            this.ran.Size = new System.Drawing.Size(168, 17);
            this.ran.TabIndex = 14;
            this.ran.Text = "Випадковий ключ та пароль";
            this.ran.UseVisualStyleBackColor = true;
            this.ran.Click += new System.EventHandler(this.ran_Click);
            // 
            // label12
            // 
            this.label12.AutoSize = true;
            this.label12.Location = new System.Drawing.Point(3, 52);
            this.label12.Name = "label12";
            this.label12.Size = new System.Drawing.Size(129, 13);
            this.label12.TabIndex = 12;
            this.label12.Text = "Введіть пароль для AES";
            // 
            // tPass
            // 
            this.tPass.Location = new System.Drawing.Point(138, 49);
            this.tPass.Name = "tPass";
            this.tPass.Size = new System.Drawing.Size(466, 20);
            this.tPass.TabIndex = 13;
            this.tPass.TextChanged += new System.EventHandler(this.tPass_TextChanged);
            this.tPass.MouseEnter += new System.EventHandler(this.tPass_MouseEnter);
            // 
            // winEncrypt
            // 
            this.winEncrypt.AutoSize = true;
            this.winEncrypt.Location = new System.Drawing.Point(8, 297);
            this.winEncrypt.Name = "winEncrypt";
            this.winEncrypt.Size = new System.Drawing.Size(0, 13);
            this.winEncrypt.TabIndex = 11;
            // 
            // tabPage2
            // 
            this.tabPage2.Controls.Add(this.r4);
            this.tabPage2.Controls.Add(this.button2);
            this.tabPage2.Controls.Add(this.r3);
            this.tabPage2.Controls.Add(this.button4);
            this.tabPage2.Controls.Add(this.r2);
            this.tabPage2.Controls.Add(this.button3);
            this.tabPage2.Controls.Add(this.r1);
            this.tabPage2.Controls.Add(this.button1);
            this.tabPage2.Controls.Add(this.winDecrypt);
            this.tabPage2.Controls.Add(this.panel2);
            this.tabPage2.Controls.Add(this.b2);
            this.tabPage2.Location = new System.Drawing.Point(4, 22);
            this.tabPage2.Name = "tabPage2";
            this.tabPage2.Padding = new System.Windows.Forms.Padding(3);
            this.tabPage2.Size = new System.Drawing.Size(612, 342);
            this.tabPage2.TabIndex = 1;
            this.tabPage2.Text = "Розшифрувати";
            this.tabPage2.UseVisualStyleBackColor = true;
            // 
            // r4
            // 
            this.r4.Enabled = false;
            this.r4.Location = new System.Drawing.Point(207, 135);
            this.r4.Name = "r4";
            this.r4.Size = new System.Drawing.Size(397, 20);
            this.r4.TabIndex = 19;
            this.r4.TextChanged += new System.EventHandler(this.r4_TextChanged);
            // 
            // button2
            // 
            this.button2.Location = new System.Drawing.Point(8, 133);
            this.button2.Name = "button2";
            this.button2.Size = new System.Drawing.Size(193, 23);
            this.button2.TabIndex = 20;
            this.button2.Text = "Оберіть файл пароля AES ";
            this.button2.UseVisualStyleBackColor = true;
            this.button2.Click += new System.EventHandler(this.button2_Click_1);
            // 
            // r3
            // 
            this.r3.Enabled = false;
            this.r3.Location = new System.Drawing.Point(207, 96);
            this.r3.Name = "r3";
            this.r3.Size = new System.Drawing.Size(397, 20);
            this.r3.TabIndex = 17;
            this.r3.TextChanged += new System.EventHandler(this.r3_TextChanged);
            // 
            // button4
            // 
            this.button4.Location = new System.Drawing.Point(8, 94);
            this.button4.Name = "button4";
            this.button4.Size = new System.Drawing.Size(193, 23);
            this.button4.TabIndex = 18;
            this.button4.Text = "Оберіть шифрований файл AES";
            this.button4.UseVisualStyleBackColor = true;
            this.button4.Click += new System.EventHandler(this.button4_Click);
            // 
            // r2
            // 
            this.r2.Enabled = false;
            this.r2.Location = new System.Drawing.Point(207, 57);
            this.r2.Name = "r2";
            this.r2.Size = new System.Drawing.Size(397, 20);
            this.r2.TabIndex = 15;
            this.r2.TextChanged += new System.EventHandler(this.tKeyFile_TextChanged);
            // 
            // button3
            // 
            this.button3.Location = new System.Drawing.Point(8, 55);
            this.button3.Name = "button3";
            this.button3.Size = new System.Drawing.Size(193, 23);
            this.button3.TabIndex = 16;
            this.button3.Text = "Оберіть файл ключа RC6";
            this.button3.UseVisualStyleBackColor = true;
            this.button3.Click += new System.EventHandler(this.button3_Click);
            // 
            // r1
            // 
            this.r1.Enabled = false;
            this.r1.Location = new System.Drawing.Point(207, 18);
            this.r1.Name = "r1";
            this.r1.Size = new System.Drawing.Size(397, 20);
            this.r1.TabIndex = 13;
            this.r1.TextChanged += new System.EventHandler(this.tEncrFile_TextChanged);
            // 
            // button1
            // 
            this.button1.Location = new System.Drawing.Point(8, 16);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(193, 23);
            this.button1.TabIndex = 14;
            this.button1.Text = "Оберіть шифрований файл RC6 ";
            this.button1.UseVisualStyleBackColor = true;
            this.button1.Click += new System.EventHandler(this.button1_Click_1);
            // 
            // winDecrypt
            // 
            this.winDecrypt.AutoSize = true;
            this.winDecrypt.Location = new System.Drawing.Point(12, 301);
            this.winDecrypt.Name = "winDecrypt";
            this.winDecrypt.Size = new System.Drawing.Size(0, 13);
            this.winDecrypt.TabIndex = 12;
            // 
            // panel2
            // 
            this.panel2.Controls.Add(this.l2);
            this.panel2.Controls.Add(this.l1);
            this.panel2.Controls.Add(this.label8);
            this.panel2.Controls.Add(this.label9);
            this.panel2.Controls.Add(this.label10);
            this.panel2.Controls.Add(this.label11);
            this.panel2.Location = new System.Drawing.Point(8, 221);
            this.panel2.Name = "panel2";
            this.panel2.Size = new System.Drawing.Size(596, 91);
            this.panel2.TabIndex = 10;
            // 
            // l2
            // 
            this.l2.AutoSize = true;
            this.l2.Location = new System.Drawing.Point(487, 40);
            this.l2.Name = "l2";
            this.l2.Size = new System.Drawing.Size(10, 13);
            this.l2.TabIndex = 5;
            this.l2.Text = "-";
            // 
            // l1
            // 
            this.l1.AutoSize = true;
            this.l1.Location = new System.Drawing.Point(121, 40);
            this.l1.Name = "l1";
            this.l1.Size = new System.Drawing.Size(10, 13);
            this.l1.TabIndex = 4;
            this.l1.Text = "-";
            // 
            // label8
            // 
            this.label8.AutoSize = true;
            this.label8.Location = new System.Drawing.Point(370, 40);
            this.label8.Name = "label8";
            this.label8.Size = new System.Drawing.Size(111, 13);
            this.label8.TabIndex = 3;
            this.label8.Text = "Час розшифрування";
            // 
            // label9
            // 
            this.label9.AutoSize = true;
            this.label9.Location = new System.Drawing.Point(4, 40);
            this.label9.Name = "label9";
            this.label9.Size = new System.Drawing.Size(111, 13);
            this.label9.TabIndex = 2;
            this.label9.Text = "Час розшифрування";
            // 
            // label10
            // 
            this.label10.AutoSize = true;
            this.label10.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.label10.Location = new System.Drawing.Point(425, 12);
            this.label10.Name = "label10";
            this.label10.Size = new System.Drawing.Size(38, 16);
            this.label10.TabIndex = 1;
            this.label10.Text = "AES";
            // 
            // label11
            // 
            this.label11.AutoSize = true;
            this.label11.Font = new System.Drawing.Font("Microsoft Sans Serif", 9.75F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(204)));
            this.label11.Location = new System.Drawing.Point(52, 12);
            this.label11.Name = "label11";
            this.label11.Size = new System.Drawing.Size(37, 16);
            this.label11.TabIndex = 0;
            this.label11.Text = "RC6";
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(620, 392);
            this.Controls.Add(this.tab);
            this.Controls.Add(this.menuStrip1);
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.MainMenuStrip = this.menuStrip1;
            this.Name = "Form1";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Тестувальник шифрів";
            this.Load += new System.EventHandler(this.Form1_Load);
            this.menuStrip1.ResumeLayout(false);
            this.menuStrip1.PerformLayout();
            this.panel1.ResumeLayout(false);
            this.panel1.PerformLayout();
            this.tab.ResumeLayout(false);
            this.tabPage1.ResumeLayout(false);
            this.tabPage1.PerformLayout();
            this.tabPage2.ResumeLayout(false);
            this.tabPage2.PerformLayout();
            this.panel2.ResumeLayout(false);
            this.panel2.PerformLayout();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.OpenFileDialog openFile;
        private System.Windows.Forms.Button b1;
        private System.Windows.Forms.Button b2;
        private System.Windows.Forms.MenuStrip menuStrip1;
        private System.Windows.Forms.ToolStripMenuItem файлToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem проПрограммуToolStripMenuItem;
        private System.Windows.Forms.ToolStripMenuItem рToolStripMenuItem;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.TextBox file;
        private System.Windows.Forms.Button bSelectFile;
        private System.Windows.Forms.Panel panel1;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Label label2;
        private System.Windows.Forms.TextBox tKey;
        private System.Windows.Forms.Label t2;
        private System.Windows.Forms.Label t1;
        private System.Windows.Forms.Label label5;
        private System.Windows.Forms.Label label4;
        private System.Windows.Forms.TabControl tab;
        private System.Windows.Forms.TabPage tabPage1;
        private System.Windows.Forms.Label winEncrypt;
        private System.Windows.Forms.TabPage tabPage2;
        private System.Windows.Forms.ToolStripMenuItem вихідToolStripMenuItem;
        private System.Windows.Forms.TextBox r2;
        private System.Windows.Forms.Button button3;
        private System.Windows.Forms.TextBox r1;
        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.Label winDecrypt;
        private System.Windows.Forms.Panel panel2;
        private System.Windows.Forms.Label l2;
        private System.Windows.Forms.Label l1;
        private System.Windows.Forms.Label label8;
        private System.Windows.Forms.Label label9;
        private System.Windows.Forms.Label label10;
        private System.Windows.Forms.Label label11;
        private System.Windows.Forms.OpenFileDialog openKey;
        private System.Windows.Forms.Label label12;
        private System.Windows.Forms.TextBox tPass;
        private System.Windows.Forms.TextBox r4;
        private System.Windows.Forms.Button button2;
        private System.Windows.Forms.TextBox r3;
        private System.Windows.Forms.Button button4;
        private System.Windows.Forms.OpenFileDialog openCryptRC6;
        private System.Windows.Forms.OpenFileDialog openKeyRC6;
        private System.Windows.Forms.OpenFileDialog openCryptAES;
        private System.Windows.Forms.OpenFileDialog openPassAES;
        private System.Windows.Forms.CheckBox ran;
    }
}

