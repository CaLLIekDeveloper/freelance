/*
 * Авторство Паршина Александра
 * По всем вопросам писать на e-mail parshin_sashek@mail.ru
 */
package booleancalculator;

import javax.swing.JButton;

/**
 *
 * @author parsh
 */
public class formCalc extends javax.swing.JFrame
{
    public static String text;
    JButton butsVar[] = new JButton[5];
    JButton butsAct[] = new JButton[2];
    
    int leftB = 0;
    int rightB = 0;
    

    /**
     * Creates new form formCalc
     */
    public formCalc()
    {
        initComponents();
        butsVar[0] = jButton1;
        butsVar[1] = jButton2;
        butsVar[2] = jButton3;
        butsVar[3] = jButton4;
        butsVar[4] = jButton5;

        butsAct[0] = jButton6;
        butsAct[1] = jButton7;
        
        default1();
    }
    private void default1()
    {
                            ok.setEnabled(false);
                            for (int i = 0; i < butsVar.length; i++)
                            {
                                butsVar[i].setEnabled(true);
                            }
                            for (int j = 0; j < butsAct.length; j++)
                            {
                                butsAct[j].setEnabled(false);
                            }
                            s1.setEnabled(true);
                            s2.setEnabled(false);
                            s3.setEnabled(false);
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents()
    {

        jButton1 = new javax.swing.JButton();
        jButton2 = new javax.swing.JButton();
        jButton3 = new javax.swing.JButton();
        jButton4 = new javax.swing.JButton();
        jButton5 = new javax.swing.JButton();
        jButton6 = new javax.swing.JButton();
        jButton7 = new javax.swing.JButton();
        ok = new javax.swing.JButton();
        s1 = new javax.swing.JButton();
        s2 = new javax.swing.JButton();
        jCheckBox1 = new javax.swing.JCheckBox();
        jButton12 = new javax.swing.JButton();
        input = new javax.swing.JTextField();
        ok1 = new javax.swing.JButton();
        s3 = new javax.swing.JButton();
        jPanel1 = new javax.swing.JPanel();
        jLabel1 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        jMenuBar2 = new javax.swing.JMenuBar();
        jMenu1 = new javax.swing.JMenu();
        jMenuItem1 = new javax.swing.JMenuItem();
        jMenu2 = new javax.swing.JMenu();
        jMenu3 = new javax.swing.JMenu();
        jMenu4 = new javax.swing.JMenu();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setTitle("Логічний калькулятор");
        addWindowListener(new java.awt.event.WindowAdapter()
        {
            public void windowClosing(java.awt.event.WindowEvent evt)
            {
                formWindowClosing(evt);
            }
        });

        jButton1.setText("A");
        jButton1.setPreferredSize(new java.awt.Dimension(70, 25));
        jButton1.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                jButton1ActionPerformed(evt);
            }
        });

        jButton2.setText("B");
        jButton2.setPreferredSize(new java.awt.Dimension(70, 25));
        jButton2.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                jButton2ActionPerformed(evt);
            }
        });

        jButton3.setText("C");
        jButton3.setPreferredSize(new java.awt.Dimension(70, 25));
        jButton3.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                jButton3ActionPerformed(evt);
            }
        });

        jButton4.setText("D");
        jButton4.setPreferredSize(new java.awt.Dimension(70, 25));
        jButton4.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                jButton4ActionPerformed(evt);
            }
        });

        jButton5.setText("E");
        jButton5.setPreferredSize(new java.awt.Dimension(70, 25));
        jButton5.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                jButton5ActionPerformed(evt);
            }
        });

        jButton6.setText("∨");
        jButton6.setPreferredSize(new java.awt.Dimension(70, 25));
        jButton6.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                jButton6ActionPerformed(evt);
            }
        });

        jButton7.setText("∧");
        jButton7.setPreferredSize(new java.awt.Dimension(70, 25));
        jButton7.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                jButton7ActionPerformed(evt);
            }
        });

        ok.setText("Порахувати");
        ok.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                okActionPerformed(evt);
            }
        });

        s1.setText("(");
        s1.setPreferredSize(new java.awt.Dimension(70, 25));
        s1.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                s1ActionPerformed(evt);
            }
        });

        s2.setText(")");
        s2.setPreferredSize(new java.awt.Dimension(70, 25));
        s2.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                s2ActionPerformed(evt);
            }
        });

        jCheckBox1.setSelected(true);
        jCheckBox1.setText("Безпечне введення даних");
        jCheckBox1.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                jCheckBox1ActionPerformed(evt);
            }
        });

        jButton12.setFont(new java.awt.Font("Tahoma", 1, 11)); // NOI18N
        jButton12.setText("<-");
        jButton12.setActionCommand("");
        jButton12.setPreferredSize(new java.awt.Dimension(70, 25));
        jButton12.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                jButton12ActionPerformed(evt);
            }
        });

        input.setText("Введіть вираз");
        input.setEnabled(false);

        ok1.setText("Стерти все");
        ok1.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                ok1ActionPerformed(evt);
            }
        });

        s3.setText("!");
        s3.setPreferredSize(new java.awt.Dimension(70, 25));
        s3.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                s3ActionPerformed(evt);
            }
        });

        jPanel1.setLayout(new org.netbeans.lib.awtextra.AbsoluteLayout());

        jLabel1.setText("Диз'юнкція");
        jLabel1.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        jLabel1.addMouseListener(new java.awt.event.MouseAdapter()
        {
            public void mouseClicked(java.awt.event.MouseEvent evt)
            {
                jLabel1MouseClicked(evt);
            }
        });
        jPanel1.add(jLabel1, new org.netbeans.lib.awtextra.AbsoluteConstraints(5, 10, -1, -1));

        jLabel3.setText("Заперечення");
        jLabel3.setPreferredSize(new java.awt.Dimension(75, 14));
        jLabel3.addMouseListener(new java.awt.event.MouseAdapter()
        {
            public void mouseClicked(java.awt.event.MouseEvent evt)
            {
                jLabel3MouseClicked(evt);
            }
        });
        jPanel1.add(jLabel3, new org.netbeans.lib.awtextra.AbsoluteConstraints(153, 10, 90, -1));

        jLabel2.setText("Кон'юнкція");
        jLabel2.setCursor(new java.awt.Cursor(java.awt.Cursor.HAND_CURSOR));
        jLabel2.setPreferredSize(new java.awt.Dimension(64, 14));
        jLabel2.addMouseListener(new java.awt.event.MouseAdapter()
        {
            public void mouseClicked(java.awt.event.MouseEvent evt)
            {
                jLabel2MouseClicked(evt);
            }
        });
        jPanel1.add(jLabel2, new org.netbeans.lib.awtextra.AbsoluteConstraints(81, 10, 70, -1));

        jMenu1.setText("Файл");

        jMenuItem1.setText("Вихід");
        jMenuItem1.addMouseListener(new java.awt.event.MouseAdapter()
        {
            public void mouseClicked(java.awt.event.MouseEvent evt)
            {
                jMenuItem1MouseClicked(evt);
            }
        });
        jMenuItem1.addActionListener(new java.awt.event.ActionListener()
        {
            public void actionPerformed(java.awt.event.ActionEvent evt)
            {
                jMenuItem1ActionPerformed(evt);
            }
        });
        jMenu1.add(jMenuItem1);

        jMenuBar2.add(jMenu1);

        jMenu2.setText("Диз'юнкція");
        jMenu2.addMouseListener(new java.awt.event.MouseAdapter()
        {
            public void mouseClicked(java.awt.event.MouseEvent evt)
            {
                jMenu2MouseClicked(evt);
            }
        });
        jMenuBar2.add(jMenu2);

        jMenu3.setText("Кон'юнкція");
        jMenu3.addMouseListener(new java.awt.event.MouseAdapter()
        {
            public void mouseClicked(java.awt.event.MouseEvent evt)
            {
                jMenu3MouseClicked(evt);
            }
        });
        jMenuBar2.add(jMenu3);

        jMenu4.setText("Інформація");
        jMenu4.addMouseListener(new java.awt.event.MouseAdapter()
        {
            public void mouseClicked(java.awt.event.MouseEvent evt)
            {
                jMenu4MouseClicked(evt);
            }
        });
        jMenuBar2.add(jMenu4);

        setJMenuBar(jMenuBar2);

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                                .addGroup(layout.createSequentialGroup()
                                    .addComponent(jButton1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                    .addComponent(jButton2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                    .addComponent(jButton3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                    .addComponent(jButton4, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                    .addComponent(jButton5, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                                .addComponent(jCheckBox1)
                                .addComponent(input)
                                .addGroup(layout.createSequentialGroup()
                                    .addComponent(jButton6, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                                    .addComponent(jButton7, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                    .addComponent(s3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                    .addComponent(s1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                                    .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                                    .addComponent(s2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)))
                            .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, 373, javax.swing.GroupLayout.PREFERRED_SIZE))
                        .addGap(0, 0, Short.MAX_VALUE))
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(ok1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(jButton12, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                        .addComponent(ok, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)))
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(6, 6, 6)
                .addComponent(jCheckBox1)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(input, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jButton1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jButton2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jButton3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jButton4, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jButton5, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(37, 37, 37)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jButton6, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jButton7, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(s1, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(s2, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(s3, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addComponent(jPanel1, javax.swing.GroupLayout.PREFERRED_SIZE, 30, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(18, 18, 18)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(ok, javax.swing.GroupLayout.PREFERRED_SIZE, 37, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(ok1, javax.swing.GroupLayout.PREFERRED_SIZE, 37, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jButton12, javax.swing.GroupLayout.PREFERRED_SIZE, 37, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jCheckBox1ActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_jCheckBox1ActionPerformed
    {//GEN-HEADEREND:event_jCheckBox1ActionPerformed
        if (!input.getText().matches("Введіть вираз"))
        {
            input.setText(null);
        }
        input.setEnabled(!jCheckBox1.isSelected());
    }//GEN-LAST:event_jCheckBox1ActionPerformed

    private boolean checkLastAct(char a)
    {
        if (a == '∧' || a == '∨' || a == '!')
        {
            return true;
        }
        return false;
    }

    private void addChar()
    {

    }

    private boolean checkLastVar(char a)
    {
        if (a == 'A' || a == 'B' || a == 'C' || a == 'D' || a == 'E' || a=='!')
        {
            return true;
        }
        return false;
    }
    private void formWindowClosing(java.awt.event.WindowEvent evt)//GEN-FIRST:event_formWindowClosing
    {//GEN-HEADEREND:event_formWindowClosing
        //DisplayDriver.Exit();
        //this.dispose();
    }//GEN-LAST:event_formWindowClosing

    private void jButton2ActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_jButton2ActionPerformed
    {//GEN-HEADEREND:event_jButton2ActionPerformed
        if (input.getText().matches("Введіть вираз"))
        {
            input.setText(null);
        }
        input.setText(input.getText()+jButton2.getText());
        if (jCheckBox1.isSelected())checkCorrect();

    }//GEN-LAST:event_jButton2ActionPerformed

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_jButton1ActionPerformed
    {//GEN-HEADEREND:event_jButton1ActionPerformed
        if (input.getText().matches("Введіть вираз"))
        {
            input.setText(null);
        }
        input.setText(input.getText()+jButton1.getText());
        if (jCheckBox1.isSelected())checkCorrect();
    }//GEN-LAST:event_jButton1ActionPerformed

    private void jButton3ActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_jButton3ActionPerformed
    {//GEN-HEADEREND:event_jButton3ActionPerformed
        if (input.getText().matches("Введіть вираз"))
        {
            input.setText(null);
        }
        input.setText(input.getText()+jButton3.getText());     
        if (jCheckBox1.isSelected())checkCorrect();// TODO add your handling code here:
    }//GEN-LAST:event_jButton3ActionPerformed

    private void jButton4ActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_jButton4ActionPerformed
    {//GEN-HEADEREND:event_jButton4ActionPerformed
        if (input.getText().matches("Введіть вираз"))
        {
            input.setText(null);
        }
        
        input.setText(input.getText()+jButton4.getText());      
        if (jCheckBox1.isSelected())checkCorrect();// TODO add your handling code here:
    }//GEN-LAST:event_jButton4ActionPerformed

    private void jButton5ActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_jButton5ActionPerformed
    {//GEN-HEADEREND:event_jButton5ActionPerformed
        if (input.getText().matches("Введіть вираз"))
        {
            input.setText(null);
        }
        input.setText(input.getText()+jButton5.getText());       
        if (jCheckBox1.isSelected())checkCorrect();// TODO add your handling code here:
    }//GEN-LAST:event_jButton5ActionPerformed

    private void jButton6ActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_jButton6ActionPerformed
    {//GEN-HEADEREND:event_jButton6ActionPerformed
        if (input.getText().matches("Введіть вираз"))
        {
            input.setText(null);
        }
        input.setText(input.getText()+"∨");
    if (jCheckBox1.isSelected())checkCorrect();        // TODO add your handling code here:
    }//GEN-LAST:event_jButton6ActionPerformed

    private void jButton7ActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_jButton7ActionPerformed
    {//GEN-HEADEREND:event_jButton7ActionPerformed
        if (input.getText().matches("Введіть вираз"))
        {
            input.setText(null);
        }
        input.setText(input.getText()+"∧");
    if (jCheckBox1.isSelected())checkCorrect();        // TODO add your handling code here:
    }//GEN-LAST:event_jButton7ActionPerformed

    private void s1ActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_s1ActionPerformed
    {//GEN-HEADEREND:event_s1ActionPerformed
        if (input.getText().matches("Введіть вираз"))
        {
            input.setText(null);
        }
        input.setText(input.getText()+s1.getText()); 
        leftB++;
        if (jCheckBox1.isSelected())checkCorrect();// TODO add your handling code here:
    }//GEN-LAST:event_s1ActionPerformed

    private void s2ActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_s2ActionPerformed
    {//GEN-HEADEREND:event_s2ActionPerformed
        if (input.getText().matches("Введіть вираз"))
        {
            input.setText(null);
        }
        input.setText(input.getText()+s2.getText());
        rightB++;
        
        if (jCheckBox1.isSelected())checkCorrect();
        checkCorrectBracket();
    }//GEN-LAST:event_s2ActionPerformed

    private void jButton12ActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_jButton12ActionPerformed
    {//GEN-HEADEREND:event_jButton12ActionPerformed
        if(input.getText().length()>0)try {
            System.out.println(input.getText().charAt(input.getText().length() - 1));
            if(input.getText().charAt(input.getText().length()-1)=='(')leftB--;
            if(input.getText().charAt(input.getText().length()-1)==')')rightB--;
            input.setText(input.getText(0, input.getText().length() - 1));
            checkCorrectBracket();
        }
        catch (Exception ex) {
        }
        if (jCheckBox1.isSelected())
            if (input.getText().length() == 0)
            {
                for (int i = 0; i < butsVar.length; i++)
                {
                    butsVar[i].setEnabled(true);
                }
                for (int j = 0; j < butsAct.length; j++)
                {
                    butsAct[j].setEnabled(false);
                }
                s1.setEnabled(true);
                s2.setEnabled(false);
                ok.setEnabled(false);
            }
        if (jCheckBox1.isSelected())checkCorrect();
    }//GEN-LAST:event_jButton12ActionPerformed

    private void okActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_okActionPerformed
    {//GEN-HEADEREND:event_okActionPerformed
        text = input.getText();
        DisplayDriver.frame.setLocationRelativeTo(null);
        DisplayDriver.answer();
        
        DisplayDriver.frame.setVisible(true);
    }//GEN-LAST:event_okActionPerformed

    private void ok1ActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_ok1ActionPerformed
    {//GEN-HEADEREND:event_ok1ActionPerformed
        input.setText(null);
        leftB=0;
        rightB=0;
        default1();
    }//GEN-LAST:event_ok1ActionPerformed

    private void s3ActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_s3ActionPerformed
    {//GEN-HEADEREND:event_s3ActionPerformed
        if (input.getText().matches("Введіть вираз"))
        {
            input.setText(null);
        }
        input.setText(input.getText()+s3.getText());       
        if (jCheckBox1.isSelected())checkCorrect();// TODO add your handling code here:        // TODO add your handling code here:
    }//GEN-LAST:event_s3ActionPerformed

    private void jLabel3MouseClicked(java.awt.event.MouseEvent evt)//GEN-FIRST:event_jLabel3MouseClicked
    {//GEN-HEADEREND:event_jLabel3MouseClicked
        // TODO add your handling code here:
    }//GEN-LAST:event_jLabel3MouseClicked

    private void jLabel1MouseClicked(java.awt.event.MouseEvent evt)//GEN-FIRST:event_jLabel1MouseClicked
    {//GEN-HEADEREND:event_jLabel1MouseClicked
        Bool bool = new Bool();
        bool.setVisible(true);
        bool.setLocationRelativeTo(null);
    }//GEN-LAST:event_jLabel1MouseClicked

    private void jLabel2MouseClicked(java.awt.event.MouseEvent evt)//GEN-FIRST:event_jLabel2MouseClicked
    {//GEN-HEADEREND:event_jLabel2MouseClicked
        Bool1 bool = new Bool1();
        bool.setVisible(true);
        bool.setLocationRelativeTo(null);// TODO add your handling code here:
    }//GEN-LAST:event_jLabel2MouseClicked

    private void jMenuItem1ActionPerformed(java.awt.event.ActionEvent evt)//GEN-FIRST:event_jMenuItem1ActionPerformed
    {//GEN-HEADEREND:event_jMenuItem1ActionPerformed
        System.exit(0);
    }//GEN-LAST:event_jMenuItem1ActionPerformed

    private void jMenu2MouseClicked(java.awt.event.MouseEvent evt)//GEN-FIRST:event_jMenu2MouseClicked
    {//GEN-HEADEREND:event_jMenu2MouseClicked
        Bool bool = new Bool();
        bool.setVisible(true);
        bool.setLocationRelativeTo(null);        // TODO add your handling code here:
    }//GEN-LAST:event_jMenu2MouseClicked

    private void jMenu3MouseClicked(java.awt.event.MouseEvent evt)//GEN-FIRST:event_jMenu3MouseClicked
    {//GEN-HEADEREND:event_jMenu3MouseClicked
        Bool1 bool = new Bool1();
        bool.setVisible(true);
        bool.setLocationRelativeTo(null);        // TODO add your handling code here:
    }//GEN-LAST:event_jMenu3MouseClicked

    private void jMenuItem1MouseClicked(java.awt.event.MouseEvent evt)//GEN-FIRST:event_jMenuItem1MouseClicked
    {//GEN-HEADEREND:event_jMenuItem1MouseClicked
         System.exit(0);
         
         this.dispose();
    }//GEN-LAST:event_jMenuItem1MouseClicked

    private void jMenu4MouseClicked(java.awt.event.MouseEvent evt)//GEN-FIRST:event_jMenu4MouseClicked
    {//GEN-HEADEREND:event_jMenu4MouseClicked
        Inform temp = new Inform();
        temp.setVisible(true);
        temp.setLocationRelativeTo(null);
    }//GEN-LAST:event_jMenu4MouseClicked
    
    private void checkCorrectBracket()
    {
        if(rightB==leftB)
        {
            s2.setEnabled(false);
            ok.setEnabled(true);
        }
        else
            ok.setEnabled(false);
    }
    private void checkCorrect()
    {
        if (jCheckBox1.isSelected())
                {
                    
                    if (input.getText().length() > 0)
                    {
                        
                        if (checkLastVar(input.getText().charAt(input.getText().length() - 1)))
                        {
                            for (int i = 0; i < butsVar.length; i++)
                            {
                                butsVar[i].setEnabled(false);
                            }
                            for (int j = 0; j < butsAct.length; j++)
                            {
                                butsAct[j].setEnabled(true);
                            }
                            ok.setEnabled(true);
                            s1.setEnabled(false);
                            if(leftB>rightB)s2.setEnabled(true);
                            s3.setEnabled(true);
                        }
                        
                        else if (checkLastAct(input.getText().charAt(input.getText().length() - 1)))
                        {
                            s1.setEnabled(true);
                            s2.setEnabled(false);
                            s3.setEnabled(false);
                            for (int i = 0; i < butsVar.length; i++)
                            {
                                butsVar[i].setEnabled(true);
                            }
                            for (int j = 0; j < butsAct.length; j++)
                            {
                                butsAct[j].setEnabled(false);
                            }
                            ok.setEnabled(false);

                        }
                    }
                    if (input.getText().charAt(input.getText().length() - 1)=='!')
                    {
                        s3.setEnabled(false);
                        ok.setEnabled(true);
                    }
                    if(ok.isEnabled())checkCorrectBracket();

                }
    }
    /**
     * @param args the command line arguments
     */
    public static void main(String args[])
    {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try
        {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels())
            {
                if ("Nimbus".equals(info.getName()))
                {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        }
        catch (ClassNotFoundException ex)
        {
            java.util.logging.Logger.getLogger(formCalc.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        catch (InstantiationException ex)
        {
            java.util.logging.Logger.getLogger(formCalc.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        catch (IllegalAccessException ex)
        {
            java.util.logging.Logger.getLogger(formCalc.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        catch (javax.swing.UnsupportedLookAndFeelException ex)
        {
            java.util.logging.Logger.getLogger(formCalc.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable()
        {
            public void run()
            {
                formCalc form = new formCalc();
                form.setVisible(true);
                form.setLocationRelativeTo(null);
                DisplayDriver.main(args);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JTextField input;
    private javax.swing.JButton jButton1;
    private javax.swing.JButton jButton12;
    private javax.swing.JButton jButton2;
    private javax.swing.JButton jButton3;
    private javax.swing.JButton jButton4;
    private javax.swing.JButton jButton5;
    private javax.swing.JButton jButton6;
    private javax.swing.JButton jButton7;
    private javax.swing.JCheckBox jCheckBox1;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JMenu jMenu1;
    private javax.swing.JMenu jMenu2;
    private javax.swing.JMenu jMenu3;
    private javax.swing.JMenu jMenu4;
    private javax.swing.JMenuBar jMenuBar2;
    private javax.swing.JMenuItem jMenuItem1;
    private javax.swing.JPanel jPanel1;
    private javax.swing.JButton ok;
    private javax.swing.JButton ok1;
    private javax.swing.JButton s1;
    private javax.swing.JButton s2;
    private javax.swing.JButton s3;
    // End of variables declaration//GEN-END:variables
}
