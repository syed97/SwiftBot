#!/usr/bin/env python
import rospy
from std_msgs.msg import Float32

f=open("out_left.txt","w")
f2=open("out_right.txt","w")
f3=open("target_right.txt","w")
f4=open("target_left.txt","w")
def callback1(data):
    rospy.loginfo(rospy.get_caller_id()+"I heard right_pwm %f",data.data)
    f.write(str(data.data)+"\n")
def callback2(data):
    rospy.loginfo(rospy.get_caller_id()+"I heard left_pwm %f",data.data)
    f2.write(str(data.data)+"\n")
def callback3(data):
    rospy.loginfo(rospy.get_caller_id()+"I heard right_target %f",data.data)
    f3.write(str(data.data)+"\n")
def callback4(data):
    rospy.loginfo(rospy.get_caller_id()+"I heard left_target %f",data.data)
    f4.write(str(data.data)+"\n")
def listener():
    rospy.init_node('listener', anonymous=True)
    rospy.Subscriber("/right_pwm", Float32, callback1)
    rospy.Subscriber("/left_pwm", Float32, callback2)
    rospy.Subscriber("/right_target",Float32,callback3)
    rospy.Subscriber("/left_target",Float32,callback4)
    rospy.spin()

if __name__ == '__main__':
    listener()
