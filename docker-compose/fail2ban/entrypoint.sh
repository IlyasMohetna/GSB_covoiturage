#!/bin/sh

# Ensure iptables-legacy is used
ln -sf /usr/sbin/iptables-legacy /usr/sbin/iptables
ln -sf /usr/sbin/ip6tables-legacy /usr/sbin/ip6tables

# Start fail2ban
exec "$@"
