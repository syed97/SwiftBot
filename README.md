# SwiftBot
 # How to Run the Files
 1) Files related to ROS
 2) Files related to App
 3) Files related to Facial Recognition
   # Files related to ROS
   1) If you want to run these files then you need to first download ROS Kinetic from http://wiki.ros.org/kinetic/Installation/Ubuntu (You need to have ubuntu installed in order to install ROS). You also need arduino uno and the robot to make it work.
   2) Once you have done that, please copy the files and folders under the Robot directory (on github) and paste it under the catkin directory in your system root folder.
   3) Now you must build the files. This can be done by first opening terminal, changing working directory to catkin_ws and then typing the command: catkin_make
   4) To install Google Cartographer, the mapping algorithm, follow this link: https://google-cartographer-ros.readthedocs.io/en/latest/compilation.html#building-installation
   5) Now you must source the files. This can be done by first opening terminal, changing working directory to catkin_ws and then typing the command: source devel/setup.bash
   6) To run the mapping algorithm, you need to upload the teleop code under arduino directory, in github, to arduino uno. You also need to install the teleop_twist_keyboard package by following this link: http://wiki.ros.org/teleop_twist_keyboard. Now, for every command, open a terminal and run them in parallel. Also every one of these terminals need to have catkin_ws as the working directory:
       - roslaunch rplidar_ros rplidar.launch               (This will turn on the lidar)
       - rosrun teleop_twist_keyboard teleop_twist_keyboard.py
       - rosrun motor_driver motor_driver.py
       - source install_isolated/setup.bash
       - roslaunch cartographer_ros cartographer.launch
       - rviz rviz
   Once that is done, go to terminal where you ran the teleop command and then follow the instruction to move the robot. You will notice the map being made on rviz. (Note: go to add topics tab in rviz and click on the topics that you want see on the gui. Particularily the map topic would be of use here.)
   7) To run the navigation stack (main program), you need to upload the main code under arduino directory, in github, to arduino uno. Now, for every command, open a terminal and run them in parallel. Also every one of these terminals need to have catkin_ws as the working directory:
       - roslaunch rplidar_ros rplidar.launch               (This will turn on the lidar)
       - roslaunch my_robot_name_2d_nav my_robot_configuration.launch 
       - rosrun my_robot_name_2d_nav move_base.launch
       - rviz rviz                                          (To visualize the robot's movement)
       - python src/simple_navigation_goals/src/mainLoop.py  (If you want it to move to a hard coded destination. This will move robot to cordinate (1,0,0))
       Else you can just use the robot's pose using the 2d_pose icon on top and then give a goal by pressing on the 2d_navigation goal icon.
   (Note: go to add topics tab in rviz and click on the topics that you want see on the gui. Particularily the map, polygon, the global path, the local path would be of use here)
       
    
