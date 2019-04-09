using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.IO;

namespace CryptTester
{
    class RC6Base
    {
        // Константы для операций свига
        public const int W = 32;
        public const int R = 16;

        // Переменные для работы с файлами
        public Byte[] fileData;
        public uint fileLength;

        // Список расшифрованных / рашифрованных данных
        public List<Byte> resultData = new List<Byte>();

        // Крипто-ключ
        public UInt32[] key = new UInt32[2 * R + 4];

        // Функция записи данных в файл
        public void WriteByteArrayToFile(Byte[] buffer, string fileName)
        {
            try
            {
                FileStream fs = new FileStream(fileName, FileMode.Create, FileAccess.ReadWrite);
                BinaryWriter bw = new BinaryWriter(fs);

                for (int i = 0; i < fileLength; i++)
                    bw.Write(buffer[i]);

                bw.Close();
                fs.Close();
            }
            catch (Exception ex)
            {
                // Опущено для реализации под различными типами проектов
            }
        }

        // Функция чтения данных из файла
        public Byte[] ReadByteArrayFromFile(string fileName)
        {
            Byte[] buffer = null;

            try
            {
                FileStream fs = new FileStream(fileName, FileMode.Open, FileAccess.Read);
                BinaryReader br = new BinaryReader(fs);

                long numBytes = new FileInfo(fileName).Length;
                buffer = br.ReadBytes((int)numBytes);

                br.Close();
                fs.Close();
            }
            catch (Exception ex)
            {
                // Опущено для реализации под различными типами проектов
            }

            return buffer;
        }

        // Функция сдвига вправо
        public UInt32 RightShift(UInt32 z_value, int z_shift)
        {
            return ((z_value >> z_shift) | (z_value << (W - z_shift)));
        }

        // Функция сдвига влево
        public UInt32 LeftShift(UInt32 z_value, int z_shift)
        {
            return ((z_value << z_shift) | (z_value >> (W - z_shift)));
        }

        // Функция определения числа сдвигов
        public int OffsetAmount(int dwVar)
        {
            int nLgw = (int)(Math.Log((double)W) / Math.Log(2.0));

            dwVar = dwVar << (W - nLgw);
            dwVar = dwVar >> (W - nLgw);

            return dwVar;
        }

        // Функция генерации ключа
        public void KeyGen(UInt32 dwKey)
        {
            UInt32 P32 = 0xB7E15163;
            UInt32 Q32 = 0x9E3779B9;
            UInt32 i, A, B;
            UInt32 dwByteOne, dwByteTwo, dwByteThree, dwByteFour;

            dwByteOne = dwKey >> 24;
            dwByteTwo = dwKey >> 8;
            dwByteTwo = dwByteTwo & 0x0010;
            dwByteThree = dwKey << 8;
            dwByteThree = dwByteThree & 0x0100;
            dwByteFour = dwKey << 24;

            dwKey = dwByteOne | dwByteTwo | dwByteThree | dwByteFour;

            key[0] = P32;

            for (i = 1; i < 2 * R + 4; i++)
                key[i] = key[i - 1] + Q32;

            i = A = B = 0;

            int v = 3 * Math.Max(1, 2 * R + 4);

            for (int s = 1; s <= v; s++)
            {
                A = key[i] = LeftShift(key[i] + A + B, OffsetAmount(3));
                B = dwKey = LeftShift(dwKey + A + B, OffsetAmount((int)(A + B)));

                i = (i + 1) % (2 * R + 4);
            }
        }

        // Функция преобразования массива UInt32 к списку байт
        public void ConvertFromUInt32ToByteArray(UInt32[] array)
        {
            List<byte> results = new List<byte>();

            foreach (UInt32 value in array)
            {
                byte[] converted = BitConverter.GetBytes(value);
                results.AddRange(converted);
            }

            // Формирование списка зашифрованных / расшифрванных байт данных
            resultData.AddRange(results);
        }

        // Функия преобразования массива байт в массив UInt32 (подогнана под текущую задачу)
        public UInt32[] ConvertFromByteArrayToUIn32(byte[] array, int position)
        {
            List<UInt32> results = new List<UInt32>();
            // Размер блока конвертируемых данных. Читаем по 16 байт.
            int length = position + 16;

            for (int i = position; i < length; i += 4)
            {
                byte[] temp = new byte[4];

                for (int j = 0; j < 4; ++j)
                {
                    if (i + j < array.Length)
                        temp[j] = array[i + j];
                    else
                        temp[j] = 0x00;         // заполняем недостающие блоки в случае достижения
                                                // конца файла
                }

                results.Add(BitConverter.ToUInt32(temp, 0));
            }

            return results.ToArray();
        }

        // Функция расшифровки файла
        public void DecodeFile()
        {
            UInt32[] pdwTemp;

            for (int i = 0; i < fileLength; i += 16)
            {
                pdwTemp = ConvertFromByteArrayToUIn32(fileData, i);

                pdwTemp[1] = (pdwTemp[1] + key[0]);
                pdwTemp[3] = (pdwTemp[3] + key[1]);

                for (int j = 1; j <= R; j++)
                {
                    UInt32 t = LeftShift((pdwTemp[1] * (2 * pdwTemp[1] + 1)),
                                        OffsetAmount((int)(Math.Log((double)W) / Math.Log(2.0))));
                    UInt32 u = LeftShift((pdwTemp[3] * (2 * pdwTemp[3] + 1)),
                                        OffsetAmount((int)(Math.Log((double)W) / Math.Log(2.0))));

                    pdwTemp[0] = (LeftShift(pdwTemp[0] ^ t, OffsetAmount((int)u)) + key[2 * j]);
                    pdwTemp[2] = (LeftShift(pdwTemp[2] ^ u, OffsetAmount((int)t)) + key[2 * j + 1]);

                    UInt32 temp = pdwTemp[0];
                    pdwTemp[0] = pdwTemp[1];
                    pdwTemp[1] = pdwTemp[2];
                    pdwTemp[2] = pdwTemp[3];
                    pdwTemp[3] = temp;
                }

                pdwTemp[0] = (pdwTemp[0] + key[2 * R + 2]);
                pdwTemp[2] = (pdwTemp[2] + key[2 * R + 3]);

                // Конвертируем в выходной массив расшифрованных данных
                ConvertFromUInt32ToByteArray(pdwTemp);
            }

            pdwTemp = null;
        }

        // Функция шифрования файла
        public void EncodeFile()
        {
            UInt32[] pdwTemp;

            for (int i = 0; i < fileLength; i += 16)
            {
                pdwTemp = ConvertFromByteArrayToUIn32(fileData, i);

                pdwTemp[0] = (pdwTemp[0] - key[2 * R + 2]);
                pdwTemp[2] = (pdwTemp[2] - key[2 * R + 3]);

                for (int j = R; j >= 1; j--)
                {
                    UInt32 temp = pdwTemp[3];
                    pdwTemp[3] = pdwTemp[2];
                    pdwTemp[2] = pdwTemp[1];
                    pdwTemp[1] = pdwTemp[0];
                    pdwTemp[0] = temp;

                    UInt32 t = LeftShift((pdwTemp[1] * (2 * pdwTemp[1] + 1)),
                                        OffsetAmount((int)(Math.Log((double)W) / Math.Log(2.0))));
                    UInt32 u = LeftShift((pdwTemp[3] * (2 * pdwTemp[3] + 1)),
                                        OffsetAmount((int)(Math.Log((double)W) / Math.Log(2.0))));

                    pdwTemp[0] = (RightShift((pdwTemp[0] - key[2 * j]), OffsetAmount((int)u))) ^ t;
                    pdwTemp[2] = (RightShift((pdwTemp[2] - key[2 * j + 1]), OffsetAmount((int)t))) ^ u;
                }

                pdwTemp[1] = (pdwTemp[1] - key[0]);
                pdwTemp[3] = (pdwTemp[3] - key[1]);

                // Конвертируем в выходной массив зашифрованных данных
                ConvertFromUInt32ToByteArray(pdwTemp);
            }

            pdwTemp = null;
        }
    }
}
