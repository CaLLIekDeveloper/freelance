using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Diagnostics;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Runtime.InteropServices;
using System.Security.Cryptography;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace CryptTester
{

    public partial class Form1 : Form
    {
        [System.Runtime.InteropServices.DllImport("KERNEL32.DLL", EntryPoint = "RtlZeroMemory")]
        public static extern bool ZeroMemory(IntPtr Destination, int Length);

        string fileName;
        string fileR;
        public Form1()
        {
            InitializeComponent();
            openFile.InitialDirectory = Environment.GetFolderPath(Environment.SpecialFolder.MyDocuments);
            openCryptRC6.InitialDirectory = Environment.CurrentDirectory + "\\files\\";
        }

        private void button1_Click(object sender, EventArgs e)
        {
            try
            {
                Stopwatch sWatch = new Stopwatch();
                sWatch.Start();
                RC6Base lol = new RC6Base();
                fileName = openFile.FileName;
                lol.fileData = lol.ReadByteArrayFromFile(openFile.FileName);
                lol.fileLength = (uint)lol.fileData.Length;
                lol.KeyGen((UInt32)(int.Parse(tKey.Text)));
                lol.EncodeFile();
                lol.WriteByteArrayToFile(lol.resultData.ToArray(), Environment.CurrentDirectory + "\\files\\" + "Зашифрованный файл RC6.txt");
                using (StreamWriter sw = new StreamWriter(Environment.CurrentDirectory + "\\files\\" + "Ключ для шифрування RC6.txt", false, System.Text.Encoding.Default))
                {
                    sw.WriteLine(tKey.Text);
                }
                sWatch.Stop();
                t1.Text = sWatch.ElapsedTicks.ToString() + " тиків.";
                try
                {
                    File.Copy(openFile.FileName, Environment.CurrentDirectory + "\\files\\" + Path.GetFileName(openFile.FileName));
                }
                catch (Exception ex) { }



                sWatch.Reset();
                sWatch.Start();
                FileEncrypt(openFile.FileName, tPass.Text);
                sWatch.Stop();
                using (StreamWriter sw = new StreamWriter(Environment.CurrentDirectory + "\\files\\" + "Пароль для шифрування AES.txt", false, System.Text.Encoding.Default))
                {
                    sw.WriteLine(tPass.Text);
                }
                t2.Text = sWatch.ElapsedTicks.ToString() + " тиків.";
            }catch(Exception ex)
            {
                MessageBox.Show(this, "Неможливо зашифрувати файл перевірте його наявність.", "Помилка");
            }
        }

        private void createDirectory()
        {

            string path = Environment.CurrentDirectory + "\\files";

            try
            {
                if (Directory.Exists(path))
                {
                    return;
                }
                DirectoryInfo di = Directory.CreateDirectory(path);

            }
            catch (Exception e)
            {
            }
            finally { }
        }

        private void button2_Click(object sender, EventArgs e)
        {
            try
            {
                Stopwatch sWatch = new Stopwatch();
                sWatch.Start();
                RC6Base lol = new RC6Base();
                lol.fileData = lol.ReadByteArrayFromFile(openCryptRC6.FileName);
                lol.fileLength = (uint)lol.fileData.Length;
                string keyRS6 = "";
                try
                {
                    using (StreamReader sr = new StreamReader(openKeyRC6.FileName, System.Text.Encoding.Default))
                    {
                        keyRS6 = sr.ReadLine();
                    }
                }
                catch (Exception we) { }
                Console.WriteLine(keyRS6);
                lol.KeyGen((UInt32)int.Parse(keyRS6));
                lol.DecodeFile();
                lol.WriteByteArrayToFile(lol.resultData.ToArray(), Environment.CurrentDirectory + "\\files\\" + Path.GetFileNameWithoutExtension(fileName) + "_decryptRC6" + Path.GetExtension(fileName));
                sWatch.Stop();
                l1.Text = sWatch.ElapsedTicks + " тиків.";
            }catch(Exception ex)
            {
                MessageBox.Show(this,"Неможливо розшифрувати файл методом RC6.","Помилка");
            }

            try
            {
                string passAES = "";
                using (StreamReader sr = new StreamReader(openPassAES.FileName, System.Text.Encoding.Default))
                {
                    passAES = sr.ReadLine();
                }
                Stopwatch sWatch = new Stopwatch();
                sWatch.Reset();
                sWatch.Start();
                FileDecrypt(openCryptAES.FileName, Environment.CurrentDirectory + "\\files\\" + Path.GetFileNameWithoutExtension(fileName) + "_decryptAES" + Path.GetExtension(fileName), passAES);
                sWatch.Stop();
                l2.Text = sWatch.ElapsedTicks + " тиків.";
                System.Diagnostics.Process.Start("explorer", Environment.CurrentDirectory + "\\files");
            }catch(Exception ex)
            {
                MessageBox.Show(this, "Неможливо розшифрувати файл методом AES.", "Помилка");
            }
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void bSelectFile_Click(object sender, EventArgs e)
        {
            if (openFile.ShowDialog() == System.Windows.Forms.DialogResult.OK)
            {
                createDirectory();
                file.Text = openFile.FileName;
                fileName = openFile.FileName;
                if(tPass.Text.Length > 0 && tKey.Text.Length > 0 && file.Text.Length > 0 || ran.Checked) b1.Enabled = true;
            }
        }

        private void tKey_MaskInputRejected(object sender, MaskInputRejectedEventArgs e)
        {
            
        }

        private void tKey_TextChanged(object sender, EventArgs e)
        {

        }

        private void tKey_KeyPress(object sender, KeyPressEventArgs e)
        {
            char number = e.KeyChar;
            if (!Char.IsDigit(number) && number != 8) // цифры и клавиша BackSpace
            {
                e.Handled = true;
            }
        }

        private void tKey_TextChanged_1(object sender, EventArgs e)
        {
            if (tKey.Text.Length == 0) b1.Enabled = false;
            else
            if (tPass.Text.Length > 0 && tKey.Text.Length > 0 && file.Text.Length > 0) b1.Enabled = true;
        }

        private void проПрограммуToolStripMenuItem_Click(object sender, EventArgs e)
        {
            tab.SelectedIndex = 0;
        }

        private void рToolStripMenuItem_Click(object sender, EventArgs e)
        {
            tab.SelectedIndex = 1;
        }

        private void вихідToolStripMenuItem_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void button1_Click_1(object sender, EventArgs e)
        {
            if (openCryptRC6.ShowDialog() == System.Windows.Forms.DialogResult.OK)
            {
                r1.Text = openCryptRC6.FileName;
            }
        }

        private void button3_Click(object sender, EventArgs e)
        {
            if (openKeyRC6.ShowDialog() == System.Windows.Forms.DialogResult.OK)
            {
                r2.Text = openKeyRC6.FileName;
            }
        }

        private void tEncrFile_TextChanged(object sender, EventArgs e)
        {
            if (r1.Text.Length > 0 && r2.Text.Length > 0 && r3.Text.Length > 0 && r4.Text.Length > 0) b2.Enabled = true;
            else
                b2.Enabled = false;
        }

        private void tKeyFile_TextChanged(object sender, EventArgs e)
        {
            if (r1.Text.Length > 0 && r2.Text.Length > 0 && r3.Text.Length > 0 && r4.Text.Length > 0) b2.Enabled = true;
            else
                b2.Enabled = false;
        }




        public static byte[] GenerateRandomSalt()
        {
            byte[] data = new byte[32];

            using (RNGCryptoServiceProvider rng = new RNGCryptoServiceProvider())
            {
                for (int i = 0; i < 10; i++)
                {
                    rng.GetBytes(data);
                }
            }

            return data;
        }

        private void FileEncrypt(string inputFile, string password)
        {
            byte[] salt = GenerateRandomSalt();
            FileStream fsCrypt = new FileStream(Environment.CurrentDirectory + "\\files\\" + "Зашифрованный файл AES.txt", FileMode.Create);

            byte[] passwordBytes = System.Text.Encoding.UTF8.GetBytes(password);

            RijndaelManaged AES = new RijndaelManaged();
            AES.KeySize = 256;
            AES.BlockSize = 128;
            AES.Padding = PaddingMode.PKCS7;

            var key = new Rfc2898DeriveBytes(passwordBytes, salt, 50000);
            AES.Key = key.GetBytes(AES.KeySize / 8);
            AES.IV = key.GetBytes(AES.BlockSize / 8);

            AES.Mode = CipherMode.CFB;

            fsCrypt.Write(salt, 0, salt.Length);

            CryptoStream cs = new CryptoStream(fsCrypt, AES.CreateEncryptor(), CryptoStreamMode.Write);

            FileStream fsIn = new FileStream(inputFile, FileMode.Open);

            byte[] buffer = new byte[1048576];
            int read;

            try
            {
                while ((read = fsIn.Read(buffer, 0, buffer.Length)) > 0)
                {
                    Application.DoEvents(); 
                    cs.Write(buffer, 0, read);
                }

                fsIn.Close();
            }
            catch (Exception ex)
            {
            }
            finally
            {
                cs.Close();
                fsCrypt.Close();
            }
        }

        private void FileDecrypt(string inputFile, string outputFile, string password)
        {
            byte[] passwordBytes = System.Text.Encoding.UTF8.GetBytes(password);
            byte[] salt = new byte[32];

            FileStream fsCrypt = new FileStream(inputFile, FileMode.Open);
            fsCrypt.Read(salt, 0, salt.Length);

            RijndaelManaged AES = new RijndaelManaged();
            AES.KeySize = 256;
            AES.BlockSize = 128;
            var key = new Rfc2898DeriveBytes(passwordBytes, salt, 50000);
            AES.Key = key.GetBytes(AES.KeySize / 8);
            AES.IV = key.GetBytes(AES.BlockSize / 8);
            AES.Padding = PaddingMode.PKCS7;
            AES.Mode = CipherMode.CFB;

            CryptoStream cs = new CryptoStream(fsCrypt, AES.CreateDecryptor(), CryptoStreamMode.Read);

            FileStream fsOut = new FileStream(outputFile, FileMode.Create);

            int read;
            byte[] buffer = new byte[1048576];

            try
            {
                while ((read = cs.Read(buffer, 0, buffer.Length)) > 0)
                {
                    Application.DoEvents();
                    fsOut.Write(buffer, 0, read);
                }
            }
            catch (CryptographicException ex_CryptographicException)
            {
            }
            catch (Exception ex)
            {
            }

            try
            {
                cs.Close();
            }
            catch (Exception ex)
            {
            }
            finally
            {
                fsOut.Close();
                fsCrypt.Close();
            }
        }

        private void tPass_TextChanged(object sender, EventArgs e)
        {
            if (tPass.Text.Length == 0) b1.Enabled = false;
            else
            if (tPass.Text.Length > 0 && tKey.Text.Length>0 &&file.Text.Length>0) b1.Enabled = true;
        }

        private void r3_TextChanged(object sender, EventArgs e)
        {
            if (r1.Text.Length > 0 && r2.Text.Length > 0 && r3.Text.Length > 0 && r4.Text.Length > 0) b2.Enabled = true;
            else
                b2.Enabled = false;
        }

        private void r4_TextChanged(object sender, EventArgs e)
        {
            if (r1.Text.Length > 0 && r2.Text.Length > 0 && r3.Text.Length > 0 && r4.Text.Length > 0) b2.Enabled = true;
            else
                b2.Enabled = false;
        }

        private void button4_Click(object sender, EventArgs e)
        {
            if (openCryptAES.ShowDialog() == System.Windows.Forms.DialogResult.OK)
            {
                r3.Text = openCryptAES.FileName;
            }
        }

        private void button2_Click_1(object sender, EventArgs e)
        {
            if (openPassAES.ShowDialog() == System.Windows.Forms.DialogResult.OK)
            {
                r4.Text = openPassAES.FileName;
            }
        }

        private void tKey_MouseEnter(object sender, EventArgs e)
        {
            ToolTip t = new ToolTip();
            t.SetToolTip(tKey, "До 9 цифр");

        }

        private void tPass_MouseEnter(object sender, EventArgs e)
        {
            ToolTip t = new ToolTip();
            t.SetToolTip(tPass, "Будь-яка кількість знаків (цифр або літер)");
        }

        private void ran_Click(object sender, EventArgs e)
        {
            if(ran.Checked)
            {
                Random ran = new Random();
                tKey.Enabled = false;
                tPass.Enabled = false;
                tKey.Text = ran.Next(1, 2000000000).ToString();
                tPass.Text = ran.Next(1, 2000000000).ToString();
            }else

            {
                tKey.Enabled = !false;
                tPass.Enabled = !false;
            }
        }
    }
}
