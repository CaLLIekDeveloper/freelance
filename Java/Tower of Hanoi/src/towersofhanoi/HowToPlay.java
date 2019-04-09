package towersofhanoi;

import java.awt.Color;
import java.awt.Font;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.JTextArea;
import javax.swing.SwingConstants;

@SuppressWarnings("serial")
public class HowToPlay extends JFrame {
	JTextArea howToPlay;
	JLabel lblTitle;
	JPanel panel;
	
	public HowToPlay()
	{
		initUI();
	}

	private void initUI()
	{	
		panel = new JPanel();
		panel.setBounds(0, 0, 720, 300);
        panel.setBackground(new Color(240, 240, 240));
        //114, 226, 126
        setResizable(false);
        getContentPane().setLayout(null);
        panel.setLayout(null);

        lblTitle = new JLabel("Як грати");
        lblTitle.setForeground(new Color(51, 51, 204));
        lblTitle.setBounds(178, 0, 279, 50);
        lblTitle.setHorizontalAlignment(SwingConstants.CENTER);
        lblTitle.setFont(new Font("Comic Sans MS", Font.PLAIN, 36));
        panel.add(lblTitle);
        
        howToPlay = new JTextArea();
        howToPlay.setEditable(false);
        howToPlay.setForeground(new Color(102, 0, 0));
        howToPlay.setBounds(28, 48, 680, 236);
        howToPlay.setLineWrap(true);
        howToPlay.setWrapStyleWord(true);
        howToPlay.setFont(new Font("Comic Sans MS", Font.PLAIN, 16));
        howToPlay.setBackground(new Color(240, 240, 240));
        howToPlay.setText( "" + 
        		"Ласкаво просимо до головоломки Ханойські вежі!  Метою гри є переміщення всіх дисків з лівого стрижня на інший стрижень, дотримуючись таких правил:\n" +
        		"- За раз можна рухати лише один диск.\n- Крім того, більший диск не можна розміщувати зверху меншого диска.\n" +
        		"Натисніть на одну з трьох кнопок для переміщення диску. Спробуйте перемістити всі диски використовуючи найменшу кількість кроків.\n" +
        		"Якщо ви застрягли ви завжди можете клікнути \"Скинути\" щоб почати спочатку або натиснути \"Нові диски\" для змінни кількості дисків." +
        		"Рішення цієї головоломки за найменшу кількість кроків є складним завданням. Якщо ви захочете побачити його клікніть на \"Показати рішення\".");
        
	    panel.add(howToPlay);
	    
	    getContentPane().add(panel);
        
        setTitle("Як грати");
        setSize(720, 323);
        setLocationRelativeTo(null);
        setDefaultCloseOperation(DISPOSE_ON_CLOSE);
	}
}